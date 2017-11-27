<?php
Class Dinhchi extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Sinhvien_model');
		}
		function index()
		{
      $status = 2;
      $data['svStatus'] = $this->Sinhvien_model->get_infobyStatus($status);
			$data['temp'] = 'Giaovu/Dinhchi/Dinhchi';
			$this->load->view('Giaovu/index',$data);
		}
	}

 ?>
