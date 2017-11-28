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
			$data['temp'] = 'Sinhvien/Login/Login';
			$data['error'] ='';
			if ($this->input->post('login')) {
				$u = $this->input->post('username');
				$p = $this->input->post('password');
				$data = $this->Login_model->Check_userlogin($u,md5($p));
				if ($data == false) {
					$this->$data['error'] = 'Sai Username hoặc Password!';
				}
				else
				{
					$sess = array(
						'username' => $data['username'],
						'Ho'    => $data['Ho'],
            'Ten'    => $data['Ten'],
						'id'	   => $data['MSSV'],
						'phanquyen'=> $data['phanquyen_id'],
            'nganhhoc_id' => $data['nganhhoc_id'],
            'khoahoc_id' => $data['khoahoc_id'],
					);
					$this->session->set_userdata($sess);
					redirect(base_url().'Sinhvien/Home/index');
				}
			}
			$this->load->view('Sinhvien/index',$data);
		}
		function Logout ()
		{
			$this->session->sess_destroy();
			redirect(base_url().'Sinhvien/Login/index');
		}
	}

 ?>
