<?php
Class Chuongtrinhdaotao extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Kehoachdaotao_model');
      $this->load->model('Monhoc_model');
		}
		function index()
		{
			$input = array();
			//$list = $this->semester_model->get_list();
			$data['temp'] = 'Giaovu/Chuongtrinhdaotao/Chuongtrinhdaotao';
			//$data['list'] = $list;
			$this->load->view('Giaovu/index',$data);
		}
    function importCTDT()
    {

      if ($this->input->post('submit')) {
        $nganh=$this->input->post('nganhhoc');
        $khoa=$this->input->post('khoahoc');
        $this->load->library('PHPExcel');
        $file = $_FILES['file']['tmp_name'];
        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
        $objExcel = $objReader->load($file);
        $worksheet = $objExcel->getSheet(0);
        $objReader->setLoadSheetsOnly($worksheet);
        $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
        $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
        // echo $highestRow;
        // exit;
        for ($row = 6; $row < $highestRow; $row ++) {
          $dataCTDT = array(
            'monhoc_id' => $sheetData[$row]['B'],
            'dvht_tc' => $sheetData[$row]['D'],
            'tongso' => $sheetData[$row]['E'],
            'lythuyet' => $sheetData[$row]['F'],
            'baitap' => $sheetData[$row]['G'],
            'thuchanh' => $sheetData[$row]['H'],
            'baitaplon' => $sheetData[$row]['I'],
            'doAn' => $sheetData[$row]['J'],
            'khoaluan' => $sheetData[$row]['K'],
            'nganhhoc_id' => $nganh,
            'hocki_id' => $sheetData[$row]['L'],
            'khoahoc_id' => $khoa,
          );
          $dataMH = array(
            'MaMH' => $sheetData[$row]['B'],
            'TenMH' => $sheetData[$row]['C'],
          );
          if($this->Kehoachdaotao_model->create($dataCTDT) && $this->Monhoc_model->create($dataMH))
          {
              //tạo ra nội dung thông báo
              $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
          }else{
              $this->session->set_flashdata('message', 'Không thêm được');
          }
    }
	}

}
}
?>
