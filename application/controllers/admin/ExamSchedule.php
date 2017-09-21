<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamSchedule extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$data["title"] = "Thời Khóa Biểu";
		$data["subview"] = "admin/ExamSchedule/Index";
		$this->load->view('admin/layout',$data);
	}
}