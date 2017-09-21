<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$data["title"] = "Quản Lý Giảng Viên";
        $data["subview"] = "admin/Teacher/Index";
        $this->db->select("*");
        $query = $this->db->get_where('GiangVien', array('TrangThai' => 1));
        $result = $query->result_array();
        $data["lstGiangVien"] = $result;
		$this->load->view('admin/layout',$data);
	}
}