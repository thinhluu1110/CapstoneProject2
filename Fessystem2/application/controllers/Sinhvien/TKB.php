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

        //fillter Hoc ki
        $sch_hoc_ky = $this->input->get('Hocki');
        $sch_hoc_ky = intval($sch_hoc_ky);
        if($sch_hoc_ky > 0)
        {
            $input['where']['hocki_id'] = $sch_hoc_ky;
        }

        //lay danh sach thơi khoa bieu
        $listTkb = $this->thoikhoabieu_model->get_list($input);
        $this->data['listTkb'] = $listTkb;

        //lay daanh sach hoc ki
        $this->load->model('hocki_model');
        $input = array();
        $listhocki = $this->hocki_model->get_list($input);
        $this->data['listhocki'] = $listhocki;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // //load view
        $this->data['temp'] = 'Sinhvien/tkb/tkb';
        $this->load->view('Sinhvien/index', $this->data);
    }    
}
