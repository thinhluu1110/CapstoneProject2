<?php
Class Dinhchi extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Sinhvien_model');
		}
		function index()
		{
      $status = 2;
      $data['svStatus'] = $this->Sinhvien_model->get_infobyStatus($status);
      if ($this->input->get('exp')) {
        $this->load->library('PHPExcel');
        $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Danh Sách SV HB');
        $rowcount = 1;
        $sheet->setCellValue('A'.$rowcount, 'Mã sinh viên');
        $sheet->setCellValue('B'.$rowcount, 'Mã hồ sơ');
        $sheet->setCellValue('C'.$rowcount, 'Họ và tên');
        $sheet->setCellValue('D'.$rowcount, 'Ngành');
        $sheet->setCellValue('E'.$rowcount, 'Khóa');
        $sheet->setCellValue('F'.$rowcount, 'Ngày đình chỉ');
        $sheet->setCellValue('H'.$rowcount, 'Lý do');
        //pre($data['svStatus']);
        foreach ($data['svStatus'] as $MSSV => $value) {
          for ($i=0; $i < count($value) ; $i++) { 
            $rowcount++;
            $sheet->setCellValue('A'.$rowcount, $value['MSSV']);
            $sheet->setCellValue('B'.$rowcount, $value['MaHS']);
            $sheet->setCellValue('C'.$rowcount, $value['Ho'].' '.$value['Ten']);
            $sheet->setCellValue('D'.$rowcount, $value['tennganh']);
            $sheet->setCellValue('E'.$rowcount, $value['tenkhoa']);
            $sheet->setCellValue('F'.$rowcount, $value['ngay_batdau']);
            $sheet->setCellValue('H'.$rowcount, $value['LiDo']);
            break;
          }
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
        $filename = 'abc.xlsx';
        $objWriter->save($filename);
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
        header('Content-Length: '.filesize($filename));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: no-cache');
        readfile($filename);
        return;
      }
			$data['temp'] = 'Giaovu/Dinhchi/Dinhchi';
			$this->load->view('Giaovu/index',$data);
		}
	}

 ?>
