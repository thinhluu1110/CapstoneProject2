<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$data["title"] = "Môn Học";
        $data["subview"] = "admin/Subject/Index";
        
        $this->db->select("*");
        $query = $this->db->get_where('MonHoc');
        $result = $query->result_array();
        $data["lstMonHoc"] = $result;

		$this->load->view('admin/layout',$data);
	}


	public function Import()
	{
		$this->load->library('excel');

		$config['upload_path']          = './uploads/xls/';
		$config['allowed_types']        = 'xls|xlsx';
		$config['max_size']             = 10000;


		$this->load->library('upload', $config);

		if ($this->upload->do_upload('xlsFile')) {
			$upload_data = $this->upload->data();
			$objPHPExcel = PHPExcel_IOFactory::load($upload_data['full_path']);
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
	
			foreach ($cell_collection as $cell) {
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				//header will/should be in row 1 only. of course this can be modified to suit your need.
				if ($row == 1) {
					$header[$row][$column] = $data_value;
				} else {
					$arr_data[$row][$column] = $data_value;
				}
			}
			$data['header'] = $header;
			$data['values'] = $arr_data;
		 }
	}
}