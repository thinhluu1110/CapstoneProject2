<?php 
	class Content extends MY_controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('semester_model');
		}
		function xemdrl()
		{
			$data = array();
			$list = $this->semester_model->get_list();
			$data['temp'] = 'sinhvien/content';
			$data['list'] = $list;
			$this->load->view('sinhvien/index',$data);
		}
	}
 ?>