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
        $input = array();
        $sch_hoc_ky = $this->input->get('Hocki');
        $nganh = $this->session->userdata('nganhhoc_id');
        $khoa = $this->session->userdata('khoahoc_id');
        //lay danh sach thơi khoa bieu
        $listTkb = $this->thoikhoabieu_model->gettkbsv_byNKHK($nganh,$khoa,$sch_hoc_ky);
        $this->data['listTkb'] = $listTkb;

        //lay daanh sach hoc ki
        $this->load->model('hocki_model');
 
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
?>
