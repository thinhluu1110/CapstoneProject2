<?php
Class Login extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
			$this->load->model('Login_model');
		}
		function index()
		{
			$data = array();
			$data['temp'] = 'Giaovu/Login/Login';
			$data['error'] ='';
			if ($this->input->post('login')) {
				$u = $this->input->post('username');
				$p = $this->input->post('password');
				$data = $this->Login_model->Check_login($u,$p);
				if ($data == false) {
					$this->$data['error'] = 'Sai Username hoặc Password!';
				}
				else
				{
					$sess = array(
						'username' => $data['username'],
						'hoten'    => $data['HoTen'],
						'id'	   => $data['admin_id'],
						'phanquyen'=> $data['phanquyen_id'],
					);
					$this->session->set_userdata($sess);
					redirect(base_url().'Giaovu/Home/index');
				}
			}
			$this->load->view('Giaovu/index',$data);
		}
		function Logout ()
		{
			$this->session->sess_destroy();
			redirect(base_url().'Giaovu/Login/index');
		}
	}

 ?>
