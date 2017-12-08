<?php
Class Lichthi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model lich thi
        $this->load->model('Lichthi_model');
    }

    /*
     * Hien thi Lich Thi
     */
    function index()
    {
        //lấy danh sách học kì hiển thị modal
        $this->load->model('Hocki_model');
        $input = array();
        $listhocki = $this->Hocki_model->get_list($input);
        $this->data['listhocki'] = $listhocki;

        //kiểm tra lọc dữ liệu hay không :
        //lọc dữ liệu Ngành học
        $nganhhoc_id = $this->input->get('Nganhhoc');

        //lọc dữ liệu Khóa học
        $khoahoc_id = $this->input->get('Khoahoc');

        //lọc dữ liệu Học kì
        $hocki_id = $this->input->get('Hocki');

        //lọc dữ liệu Lần thi
        $lanthi_id = $this->input->get('Lanthi');

        //lay danh sach ngành học
        $this->load->model('Nganhhoc_model');
        $input = array();
        $listnganhhoc = $this->Nganhhoc_model->get_list($input);
        $this->data['listnganhhoc'] = $listnganhhoc;

        //lay danh sach khoa hoc theo ngành học
        if ($nganhhoc_id) {
            $listkhoahocbynganh = $this->Lichthi_model->Get_khoabyid($nganhhoc_id);
            $this->data['listkhoahocbynganh'] = $listkhoahocbynganh;
        }

        //lấy danh sách học kì theo Ngành và khóa
        if ($nganhhoc_id && $khoahoc_id) {
            $listhockibykhoa = $this->Lichthi_model->Get_hockibyid($nganhhoc_id,$khoahoc_id);
            $this->data['listhockibykhoa'] = $listhockibykhoa;
        }

        //lay danh sach lần thi
        if ($nganhhoc_id && $khoahoc_id && $hocki_id) {
            $listlanthibyhocki = $this->Lichthi_model->Get_lanthibyhocki($nganhhoc_id,$khoahoc_id, $hocki_id);
            $this->data['listlanthibyhocki'] = $listlanthibyhocki;
        }

        //Hiển thị Lich Thi
        if ($nganhhoc_id != "" && $khoahoc_id != "" && $hocki_id != "" && $lanthi_id != "") 
        {
            $listLichthi = $this->Lichthi_model->fillterLichThi($nganhhoc_id,$khoahoc_id,$hocki_id,$lanthi_id);
        }
        else
        {
            $listLichthi = array();
        }
        $this->data['listLichthi'] = $listLichthi;

        //load view
        $this->data['temp'] = 'Giaovu/Lichthi/Lichthi';
        $this->load->view('Giaovu/index', $this->data);
    }

    public function add()
    {
        $data['message'] = array(
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
        $lanthi = $this->input->post('lanthi');

        //kiem tra filler ngành học, khóa học, học kỳ, lần thi có dữ liệu trong database
        $check_id_exit = $this->Lichthi_model->Check_id_exit($nganhhoc,$khoahoc,$hocki,$lanthi);

        //lấy ngày tháng năm
        $now= getdate();
        $time = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"];
        
        //load thư viện upload
        $this->load->library('upload_library');
        $upload_path = './upload/Lichthi';
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
                'lanthi' => $lanthi,
                'ten_anh' => $ten_anh,
                'ngay_cap_nhat' => $time,
            );

            if ($check_id_exit == false)//Nếu ngành học, khóa học, học kỳ, lần thi chưa tồn tại trong CSDL
            {
                // thực hiện thêm mới vào CSDL
                if($this->Lichthi_model->create($data))
                {
                    $last_insert_id = $this->Lichthi_model->add_post($data);

                    //lấy thông tin của thời khóa biểu theo id vừa insert
                    $info = $this->Lichthi_model->get_info($last_insert_id);
                    
                    //tạo ra nội dung thông báo
                    $data['message']['UploadSucces'] = 'Thêm Thành Công';

                    //trả ra ngày cập nhật, đường dẫn file ảnh
                    $data['message']['DateUpdate'] = $info['ngay_cap_nhat'];
                    $data['message']['ReviewImage'] = base_url('upload/Lichthi/'.$info['ten_anh']);
                }
            }
            else//Nếu ngành học, khóa học, học kỳ đã tồn tại trong CSDL
            {
                //thực hiện xóa record DL file ảnh
                $check=unlink('upload/Lichthi/'.$check_id_exit['ten_anh']);
                if ($check) 
                {
                    //lay ten file anh để upload
                    $id = $check_id_exit['lichthi_id'];
                    if($this->Lichthi_model->update($id,$data))
                    {
                        //lấy thông tin của thời khóa biểu
                        $info = $this->Lichthi_model->get_info($id);

                        //tạo ra nội dung thông báo
                        $data['message']['UpdateSucess'] = 'Cập Nhật Thành Công';

                        //trả ra ngày cập nhật, đường dẫn file ảnh
                        $data['message']['DateUpdate'] = $info['ngay_cap_nhat'];
                        $data['message']['ReviewImage'] = base_url('upload/Lichthi/'.$info['ten_anh']);
                    }
                }
            }
        }
        else{
            // Trường hợp trả về lỗi không thực hiện được upload ảnh
            $data['message']['UploadError'] = $upload_data;
        }
        echo json_encode($data);
    }

    // function index()
    // {
    //     //load ra thu vien phan trang
    //     $this->load->library('pagination');
    //     $config = array();
    //     $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang

    //     //khoi tao cac cau hinh phan trang
    //     $this->pagination->initialize($config);
        
    //     $segment = $this->uri->segment(4);
    //     $segment = intval($segment);
        
    //     $input = array();
    //     $input['limit'] = array($config['per_page'], $segment);

    //     //kiem tra co thuc hien loc du lieu hay khong
    //     //fillter Khoa hoc
    //     $ech_khoa_hoc = $this->input->get('Khoahoc');
    //     $ech_khoa_hoc = intval($ech_khoa_hoc);
    //     $input['where'] = array();
    //     if($ech_khoa_hoc > 0)
    //     {
    //         $input['where']['ech_khoa_hoc'] = $ech_khoa_hoc;
    //     }

    //     //fillter Hoc ki
    //     $ech_hoc_ki = $this->input->get('Hocki');
    //     $ech_hoc_ki = intval($ech_hoc_ki);
    //     if($ech_hoc_ki > 0)
    //     {
    //         $input['where']['ech_hoc_ki'] = $ech_hoc_ki;
    //     }

    //     //fillter Lan thi
    //     $ech_lan_thi = $this->input->get('Lanthi');
    //     if($ech_lan_thi > 0)
    //     {
    //         $input['where']['ech_lan_thi'] = $ech_lan_thi;
    //     }

    //     //lay danh sach lich thi
    //     $listLichthi = $this->lichthi_model->get_list($input);
    //     $this->data['listLichthi'] = $listLichthi;

    //     //lay danh sach khoa hoc
    //     $this->load->model('khoahoc_model');
    //     $input = array();
    //     $listkhoahoc = $this->khoahoc_model->get_list($input);
    //     $this->data['listkhoahoc'] = $listkhoahoc;

    //     //lay daanh sach hoc ki
    //     $this->load->model('hocki_model');
    //     $input = array();
    //     $listhocki = $this->hocki_model->get_list($input);
    //     $this->data['listhocki'] = $listhocki;

    //     //lay nội dung của biến message
    //     $message = $this->session->flashdata('message');
    //     $this->data['message'] = $message;

    //     // //load view
    //     $this->data['temp'] = 'Giaovu/Lichthi/Lichthi';
    //     $this->load->view('Giaovu/index', $this->data);
    // }
}
