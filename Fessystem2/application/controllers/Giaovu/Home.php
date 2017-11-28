<?php
Class Home extends MY_Controller
{
    // function index()
    // {
    //     $this->data['temp'] = 'admin/home/index';
    //     $this->load->view('admin/main', $this->data);
    // }
    function __construct()
		{
			parent::__construct();
			//$this->load->model('semester_model');
		}
		function index()
		{
			$data = array();
			//$list = $this->semester_model->get_list();
			$data['temp'] = 'Giaovu/Home/Home';
			//$data['list'] = $list;
			$this->load->view('Giaovu/index',$data);
		}
	}

 ?>
