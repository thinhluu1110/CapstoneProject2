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
        $nganh = $this->session->userdata('nganhhoc_id');
        $khoa = $this->session->userdata('khoahoc_id');

        //tra du lieu Hoc ki theo Nganh va Khoa
        if ($nganh && $khoa) {
            $listhocki = $this->Lichthi_model->Get_hockibyid($nganh,$khoa);
        }
        $this->data['listhocki'] = $listhocki;

        //lay fillter Hoc ki
        $ech_hoc_ki = $this->input->get('Hocki');

        //tra du lieu Lan thi theo Nganh, Khoa va Hoc ki
        if ($nganh && $khoa) {
            $listlanthi = $this->Lichthi_model->Get_lanthibyhocki($nganh,$khoa,$ech_hoc_ki);
        }
        $this->data['listlanthi'] = $listlanthi;

        //lay fillter Lan thi
        $ech_lan_thi = $this->input->get('Lanthi');

        //hien thi Lich Thi Hoc Ki
        if ($ech_hoc_ki != "" && $ech_lan_thi != "") {
            $listLichthi = $this->Lichthi_model->Getlichthisv_byNKHK($nganh,$khoa,$ech_hoc_ki,$ech_lan_thi);
        }else{
            $listLichthi = array();
        }
        $this->data['listLichthi'] = $listLichthi;

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
