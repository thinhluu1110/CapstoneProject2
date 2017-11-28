<?php
Class Hocphi extends MY_Controller
{

    function __construct()
		{
			parent::__construct();
			$this->load->model('Hocphi_model');
		}
		function index($mssv)
		{
      $data['list'] = $this->Hocphi_model->Get_on_info($mssv);
			$data['temp'] = 'Sinhvien/Hocphi/Hocphi';
			//$data['list'] = $list;
			$this->load->view('Sinhvien/index',$data);
		}
	}

 ?>
