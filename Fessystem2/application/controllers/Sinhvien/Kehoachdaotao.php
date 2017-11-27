<?php
	class Kehoachdaotao extends MY_controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Kehoachdaotao_model');
			$this->load->model('Hocki_model');
		}
		function index()
		{
			$nganh = $this->session->userdata('nganhhoc_id');
			$khoa = $this->session->userdata('khoahoc_id');
			$ech_hoc_ki = $this->input->get('Hocki');

			$input = array();

			//lay danh sach hoc ki
	        $this->load->model('hocki_model');

	        $listhocki = $this->hocki_model->get_list($input);
	        $data['listhocki'] = $listhocki;
	        $data['listCTDT'] = $this->Kehoachdaotao_model->filterKHDT($khoa,$nganh);
	        $data['listCTDT_by_hk'] = $this->Kehoachdaotao_model->filterKHDT_by_hk($khoa, $nganh, $ech_hoc_ki);
			//pre($data['listCTDT_by_hk']);

			$data['temp'] = 'Sinhvien/Kehoachdaotao/Kehoachdaotao';
			$this->load->view('Sinhvien/index',$data);
		}

	}
?>
