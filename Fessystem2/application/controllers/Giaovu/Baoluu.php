<?php
Class Baoluu extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Sinhvien_model');
		}
		function index()
		{
      $status = 3;
      $data['svStatus'] = $this->Sinhvien_model->get_infobyStatus($status);
			$data['temp'] = 'Giaovu/Baoluu/Baoluu';
			$this->load->view('Giaovu/index',$data);
		}
	}

 ?>
