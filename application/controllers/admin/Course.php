<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$data["title"] = "Khóa Học";
		$data["subview"] = "admin/Course/Index";

		$this->db->select("*");
        $query = $this->db->get_where('KhoaHoc');
        $result = $query->result_array();
		$data["lstKhoaHoc"] = $result;

		$this->load->view('admin/layout',$data);
	}
}
