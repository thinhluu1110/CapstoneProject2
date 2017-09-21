<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');

		$data["title"] = "Thời Khóa Biểu";
		$data["subview"] = "admin/Schedule/Index";
		$query = $this->db->get('KhoaHoc');
		$result = $query->result_array();
		$data['lstKhoaHoc'] = $result;

		$this->load->view('admin/layout',$data);
	}

	public function import()
	{
		$config['upload_path'] = './uploads/imgs';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '10000';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['remove_spaces'] = TRUE;
		if (!is_dir($config['upload_path']))
			die("THE UPLOAD DIRECTORY DOES NOT EXIST");

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('scheduleImg')) {
			echo 'error';
		} else {
			return array('upload_data' => $this->upload->data());
		}
	}
}