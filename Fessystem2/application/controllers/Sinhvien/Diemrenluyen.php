<?php
	class Diemrenluyen  extends MY_controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Diemrenluyen_model');
			//$this->load->model('Hocki_model');
		}
		function index($mssv)
		{
			$data = array();
			$data['listdrl'] = $this->Diemrenluyen_model->Get_on_info($mssv);
			//pre($data['listdrl']);
			$data['temp'] = 'Sinhvien/Diemrenluyen/Diemrenluyen';
			//$data['list'] = $list;
			$this->load->view('Sinhvien/index',$data);
		}
	}
 ?>
