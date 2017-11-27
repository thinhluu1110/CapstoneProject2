<?php
Class Tamngung extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Sinhvien_model');
		}
		function index()
		{
      $status = 1;
      $data['svStatus'] = $this->Sinhvien_model->get_infobyStatus($status);
			$data['temp'] = 'Giaovu/Tamngung/Tamngung';
			$this->load->view('Giaovu/index',$data);
		}
	}

 ?>
