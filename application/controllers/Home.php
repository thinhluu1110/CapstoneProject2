<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['subview'] = 'client/home/index';
		$this->load->view('client/layout',$data);
	}
}
