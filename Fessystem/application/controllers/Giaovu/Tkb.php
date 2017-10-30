<?php
Class Tkb extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model thoi khoa bieu
        $this->load->model('thoikhoabieu_model');
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
        //fillter Khoa hoc
        $sch_khoa_hoc = $this->input->get('Khoahoc');
        $sch_khoa_hoc = intval($sch_khoa_hoc);
        $input['where'] = array();
        if($sch_khoa_hoc > 0)
        {
            $input['where']['sch_khoa_hoc'] = $sch_khoa_hoc;
        }

        //fillter Hoc ki
        $sch_hoc_ky = $this->input->get('Hocki');
        $sch_hoc_ky = intval($sch_hoc_ky);
        if($sch_hoc_ky > 0)
        {
            $input['where']['sch_hoc_ky'] = $sch_hoc_ky;
        }

        //lay danh sach thơi khoa bieu
        $listTkb = $this->thoikhoabieu_model->get_list($input);
        $this->data['listTkb'] = $listTkb;

        //lay danh sach khoa hoc
        $this->load->model('khoahoc_model');
        $input = array();
        $listkhoahoc = $this->khoahoc_model->get_list($input);
        $this->data['listkhoahoc'] = $listkhoahoc;

        //lay daanh sach hoc ki
        $this->load->model('hocki_model');
        $input = array();
        $listhocki = $this->hocki_model->get_list($input);
        $this->data['listhocki'] = $listhocki;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // //load view
        $this->data['temp'] = 'Giaovu/Tkb/Tkb';
        $this->load->view('Giaovu/index', $this->data);
    }

    function add()
    {
        if($this->input->post('submit'))
        {
            //them vao csdl
            $khoahoc = $this->input->post('khoahoc');
            $hocki = $this->input->post('hocki');

            //lay ten file anh để upload
            $this->load->library('upload_library');
            $upload_path = './upload/Tkb';
            $upload_data = $this->upload_library->upload($upload_path, 'image');
            //pre($data);

            $sch_image = '';
            if(isset($upload_data['file_name']))
            {
                $sch_image = $upload_data['file_name'];
            }

            //luu du lieu can them
            $data = array(
                'sch_khoa_hoc' => $khoahoc,
                'sch_hoc_ky' => $hocki,
                'sch_image' => $sch_image,
            );
            //them moi vao csdl
            if($this->thoikhoabieu_model->create($data))
            {
                //tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
            }else{
                $this->session->set_flashdata('message', 'Không thêm được');
            }
        }
    }
}
