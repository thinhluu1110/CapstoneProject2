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
			//$ech_tatcahk = $this ->input->get('');
			if($ech_hoc_ki == '123'){
	        
	        
	        $data['listCTDT'] = $this->Kehoachdaotao_model->filterKHDT($khoa,$nganh);
	        //$data['listCTDT_by_hk'] = $this->Kehoachdaotao_model->filterKHDT_by_hk($khoa, $nganh, $ech_hoc_ki);
			}
			else if($ech_hoc_ki){

	        $data['listCTDT'] = $this->Kehoachdaotao_model->filterKHDT_by_hk($khoa, $nganh, $ech_hoc_ki);
			//pre($data['listCTDT_by_hk']);
			}
			
			$data['listCTDThk'] = $this->Kehoachdaotao_model->filterKHDT($khoa,$nganh);
			
			//$listhocki = 
			$data['listhocki'] = $this->Hocki_model->Get_hk();
			$data['temp'] = 'Sinhvien/Kehoachdaotao/Kehoachdaotao';
			$this->load->view('Sinhvien/index',$data);
		}

	}
?>
