<?php
Class Tkb extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model thoi khoa bieu
        $this->load->model('Thoikhoabieu_model');
    }

    /*
     * Hien thi Thoi Khoa Bieu
     */
    function index()
    {
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        //kiem tra co thuc hien loc du lieu hay khong
        //fillter Ngành học
        $nganhhoc_id = $this->input->get('Nganhhoc');

        //fillter Khoa hoc
        $khoahoc_id = $this->input->get('Khoahoc');

        //fillter Hoc ki
        $hocki_id = $this->input->get('Hocki');

        //lay danh sach thơi khoa bieu
        if($_GET != NULL)
        {
            if ($nganhhoc_id != "" && $khoahoc_id != "" && $hocki_id != "") {
                $listTkb = $this->Thoikhoabieu_model->filltertkb($nganhhoc_id,$khoahoc_id,$hocki_id);
            }
            else
                $listTkb = array();
        }
        else
        {
            $listTkb = array();
        }
        $this->data['listTkb'] = $listTkb;


        //lay danh sach ngành học
        $this->load->model('Nganhhoc_model');
        $input = array();
        $listnganhhoc = $this->Nganhhoc_model->get_list($input);
        $this->data['listnganhhoc'] = $listnganhhoc;

        //lay danh sach khoa hoc
        $listkhoahocbynganh = $this->Thoikhoabieu_model->Get_khoabyid($nganhhoc_id);
        $this->data['listkhoahocbynganh'] = $listkhoahocbynganh;

        //lay danh sach hoc ki
        $this->load->model('Hocki_model');
        $input = array();
        $listhocki = $this->Hocki_model->get_list($input);
        $this->data['listhocki'] = $listhocki;

        $listhockibykhoa = $this->Thoikhoabieu_model->Get_hockibyid($nganhhoc_id,$khoahoc_id);
        $this->data['listhockibykhoa'] = $listhockibykhoa;

        //lay nội dung của biến message
        // $message = $this->session->flashdata('message');
        // $this->data['message'] = $message;

        //lay nội dung của biến display_errors
        // $display_errors = $this->session->flashdata('display_errors');
        // $this->data['display_errors'] = $display_errors;

        //lay nội dung của biến display_errors
        $review = $this->session->flashdata('review');
        $this->data['review'] = $review;

        // //load view
        $this->data['temp'] = 'Giaovu/Tkb/Tkb';
        $this->load->view('Giaovu/index', $this->data);
    }

    
    public function add()
    {
        $data['thongbao'] = array(
            'UploadSucces' => '',
            'UploadError' => '',
            'UpdateSucess' => '',
            'UpdateError' => '',
            'DateUpdate' => '',
            'ReviewImage' => ''
        );
        
        $nganhhoc = $this->input->post('nganhhoc');
        $khoahoc = $this->input->post('khoahoc');
        $hocki = $this->input->post('hocki');

        //kiem tra filler ngành học, khóa học, học kỳ có dữ liệu trong database
        $check_id_exit = $this->Thoikhoabieu_model->Check_id_exit($nganhhoc,$khoahoc,$hocki);

        //lấy ngày tháng năm
        $now= getdate();
        $time = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"];
        
        //load thư viện upload
        $this->load->library('upload_library');
        $upload_path = './upload/Tkb';
        $upload_data = $this->upload_library->upload($upload_path, 'image');

        //Kiem tra có upload thành công
        $ten_anh = '';
        if(isset($upload_data['file_name']))
        {
            $ten_anh = $upload_data['file_name'];
            
            //luu du lieu can them
            $data = array(
                'nganhhoc_id' => $nganhhoc,
                'khoahoc_id' => $khoahoc,
                'hocki_id' => $hocki,
                'ten_anh' => $ten_anh,
                'ngay_cap_nhat' => $time,
            );

            if ($check_id_exit == false)//Nếu ngành học, khóa học, học kỳ chưa tồn tại trong CSDL
            {
                // thực hiện thêm mới vào CSDL
                if($this->Thoikhoabieu_model->create($data))
                {
                    $last_insert_id = $this->Thoikhoabieu_model->add_post($data);

                    //lấy thông tin của thời khóa biểu theo id vừa insert
                    $info = $this->Thoikhoabieu_model->get_info($last_insert_id);
                    
                    //tạo ra nội dung thông báo
                    $data['thongbao']['UploadSucces'] = 'Bạn đã thêm mới file ảnh " THÀNH CÔNG "!!';

                    //trả ra ngày cập nhật, đường dẫn file ảnh
                    //$this->session->set_flashdata('review', $info);
                    $data['thongbao']['DateUpdate'] = $info['ngay_cap_nhat'];
                    $data['thongbao']['ReviewImage'] = base_url('upload/tkb/'.$info['ten_anh']);
                }
            }
            else//Nếu ngành học, khóa học, học kỳ đã tồn tại trong CSDL
            {
                //thực hiện xóa record DL file ảnh
                $check=unlink('upload/Tkb/'.$check_id_exit['ten_anh']);
                if ($check) 
                {
                    //lay ten file anh để upload
                    $id = $check_id_exit['thoikhoabieu_id'];
                    if($this->Thoikhoabieu_model->update($id,$data))
                    {
                        //lấy thông tin của thời khóa biểu
                        $info = $this->Thoikhoabieu_model->get_info($id);

                        //tạo ra nội dung thông báo
                        $data['thongbao']['UpdateSucess'] = 'Bạn đã cập nhật file ảnh " THÀNH CÔNG " !!';

                        //trả ra ngày cập nhật, đường dẫn file ảnh
                        //$this->session->set_flashdata('review', $info);
                        $data['thongbao']['DateUpdate'] = $info['ngay_cap_nhat'];
                        $data['thongbao']['ReviewImage'] = base_url('upload/tkb/'.$info['ten_anh']);
                    }
                }
            }
        }
        else{
            // Trường hợp trả về lỗi không thực hiện được upload ảnh
            $data['thongbao']['UploadError'] = $upload_data;
        }
        echo json_encode($data);
    }
}

