<?php
Class Lichthi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model lich thi
        $this->load->model('lichthi_model');
    }

    /*
     * Hien thi Lich Thi
     */
    function index()
    {
       
        $ech_hoc_ki = $this->input->get('Hocki');
        $nganh = $this->session->userdata('nganhhoc_id');
        $khoa = $this->session->userdata('khoahoc_id');

        //fillter Lan thi
        $ech_lan_thi = $this->input->get('Lanthi');
        //lay danh sach lich thi
        $listLichthi = $this->lichthi_model->Getlichthisv_byNKHK($nganh,$khoa,$ech_hoc_ki, $ech_lan_thi);
        $this->data['listLichthi'] = $listLichthi;

        //lay daanh sach hoc ki
        $this->load->model('hocki_model');
        $input = array();
        $listhocki = $this->hocki_model->get_list($input);
        $this->data['listhocki'] = $listhocki;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // //load view
        $this->data['temp'] = 'Sinhvien/lichthi/lichthi';
        $this->load->view('Sinhvien/index', $this->data);
    }
    function get_date()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date('d/m/Y'); 
        echo $now;
        
    }
}
