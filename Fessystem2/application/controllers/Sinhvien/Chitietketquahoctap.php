<?php 
	Class Chitietketquahoctap extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Ketquahoctap_model');
			$this->load->model('Lophoc_model');
			$this->load->model('Monhoc_model');
			$this->load->model('Nganhhoc_model');
		}

		function index($idn, $idk)
		{
			$data = array();
			$data['listDiemChitiet'] = $this->Ketquahoctap_model->get_Diem_Chitiet($idn, $idk);
		 	$data['temp']  = 'Sinhvien/kqht/Chitietketquahoctap';
			$this->load->view('Sinhvien/index', $data);
		}
		
	}
?>