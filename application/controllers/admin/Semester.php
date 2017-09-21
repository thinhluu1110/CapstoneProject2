<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$data["title"] = "FES System";
        $data["subview"] = "admin/Semester/Index";
        
        $this->db->select("*");
        $query = $this->db->get_where('HocKi');
        $result = $query->result_array();
        $data["lstHocKi"] = $result;

		$this->load->view('admin/layout',$data);
	}
}