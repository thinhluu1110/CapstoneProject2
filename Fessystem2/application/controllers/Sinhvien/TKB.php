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
        $nganh = $this->session->userdata('nganhhoc_id');
        $khoa = $this->session->userdata('khoahoc_id');

        //tra du lieu Hoc ki theo Nganh va Khoa
        if ($nganh && $khoa) {
            $listhocki = $this->thoikhoabieu_model->Get_hockibyid($nganh,$khoa);
        }
        $this->data['listhocki'] = $listhocki;

        //lay Hoc ki khi fillter
        $sch_hoc_ky = $this->input->get('Hocki');

        //Hien thi Thoi Khoa Bieu
        if ($listhocki != "") {
            $listTkb = $this->thoikhoabieu_model->gettkbsv_byNKHK($nganh,$khoa,$sch_hoc_ky);
        }
        else
        {
            $listTkb = array();
        }
        $this->data['listTkb'] = $listTkb;

        // //load view
        $this->data['temp'] = 'Sinhvien/tkb/tkb';
        $this->load->view('Sinhvien/index', $this->data);
    }    
}
?>
