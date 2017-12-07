<?php
Class Quenmatkhau extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
			$this->load->model('Sinhvien_model');
		}
		function index()
		{
			$this->load->view('Quenmatkhau');
		}
    function updatepassview($email,$email_code)
		{
      if (isset($email,$email_code)) {
        $email = trim($email);
        $email_hash = sha1($email . $email_code);
        $verify = $this->Sinhvien_model->verify_email($email,$email_code);
        if ($verify) {
          $this->load->view('Thietlapmatkhau',  array('email_hash' => $email_hash, 'email_code' => $email_code, 'email' => $email));
        }
      }
			$this->load->view('Thietlapmatkhau');
		}
		function updatepass()
		{
        $email = trim($this->input->post('email'));
        $pass = md5($this->input->post('pass'));
        $load = $this->Sinhvien_model->update_pass($email,$pass);
        if($load == true)
        {
            $error['thanhcong'] = true;
        }
        echo json_encode($error);
		}
    function checkEmail()
		{
      $error = array(
        'sendmail' => '',
        'khongtontaiemail' => '',
      );
      $email = $this->input->post('email');
			$check_email = $this->Sinhvien_model->check_email($email);
      if ($check_email) {
        $this->load->library('email');
        $email_code = md5($this->config->item('salt').$check_email['Ho'].$check_email['Ten']);
        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'),'Học Bạ Điện Tử');
        $this->email->to($email);
        $this->email->subject('Vui Lòng Thiết Lập Lại Mật Khẩu Của Bạn Tại Học Bạ Điện Tử');
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body>';
        $message .= '<p>Xin Chào '.$check_email['Ho'].' '.$check_email['Ten'].',</p>';
        $message .= '<p>Vui Lòng <strong><a href="'.base_url().'Quenmatkhau/updatepassview/'.$email.'/'.$email_code.'">Nhấp Vào Đây</a></strong> Để Thiết Lập Lại Mật Khẩu</p>';
        $message .= '<p>Xin Cảm ơn!</p>';
        $message .= '</body></html>';
        $this->email->message($message);

        if ($this->email->send()) {
          $error['sendmail'] = 'Đường Dẫn Để Thiết Lập Lại Mật Khẩu Đã Được Gửi Đến Địa Chỉ '.$check_email['Email'].' Nếu Bạn Không Thấy Tin Nhắn, Hãy Thử Kiểm Trả Thư Mục Tin Rác!!';
        }
      }
		
      else {
        $error['khongtontaiemail'] = 'Địa Chỉ Email Không Tồn Tại';
      }
      echo json_encode($error);
		}
	}

 ?>
