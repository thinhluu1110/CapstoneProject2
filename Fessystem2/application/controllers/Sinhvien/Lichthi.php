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
        $ech_hoc_ki = $this->input->get('Hocki');
        $ech_hoc_ki = intval($ech_hoc_ki);
        if($ech_hoc_ki > 0)
        {
            $input['where']['hocki_id'] = $ech_hoc_ki;
        }

        //fillter Lan thi
        $ech_lan_thi = $this->input->get('Lanthi');
        if($ech_lan_thi > 0)
        {
            $input['where']['lanthi'] = $ech_lan_thi;
        }

        //lay danh sach lich thi
        $listLichthi = $this->lichthi_model->get_list($input);
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
