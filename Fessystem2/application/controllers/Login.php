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
			$data['temp'] = 'Login';
			if ($this->input->post('login')) {
				$u = $this->input->post('username');
				$p = $this->input->post('password');
        if ($u == '' || $p == '') {
          $data['user'] = 'Vui Lòng Nhập Tên Đăng Nhập Và Mật Khẩu';
        }
        else {
				$data['user'] = $this->Login_model->Check_login_admin($u,md5($p));

				if (count($data['user'])>0) {
          $sess = array(
						'username' => $data['user']['username'],
						'hoten'    => $data['user']['HoTen'],
						'id'	   => $data['user']['admin_id'],
						'phanquyen'=> $data['user']['phanquyen_id'],
					);
					$this->session->set_userdata($sess);
          redirect(base_url().'Giaovu/Nganhhoc/index');
				}
				else
				{
					$data['user'] = $this->Login_model->Check_login_sv($u,md5($p));
          if (count($data['user'])>0)
          {
            $sess = array(
              'id' => $data['user']['MSSV'],
              'username' => $data['user']['username'],
              'ho'    => $data['user']['Ho'],
              'ten'    => $data['user']['Ten'],
              'nganhhoc_id'  => $data['user']['nganhhoc_id'],
              'khoahoc_id'   => $data['user']['khoahoc_id'],
              'sdt'   => $data['user']['SDT'],
              'email'   => $data['user']['Email'],
              'ngaysinh'	   => $data['user']['Ngaysinh'],
              'phanquyen'=> $data['user']['phanquyen_id'],
            );
            $this->session->set_userdata($sess);
            redirect(base_url().'Sinhvien/Kehoachdaotao/index');
          }
          else {
            $data['user'] = 'Tài Khoản Không Tồn Tại';
          }
				}
			}

    }
			$this->load->view('Login',$data);
		}
		function Logout ()
		{
			$this->session->sess_destroy();
			redirect(base_url().'Login');
		}
	}

 ?>
