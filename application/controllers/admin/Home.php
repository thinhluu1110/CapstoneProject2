<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$data["title"] = "FES System";
		$data["subview"] = "admin/Home/Index";
		$this->load->view('admin/layout',$data);
	}
}