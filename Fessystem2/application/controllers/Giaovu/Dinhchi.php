<?php
Class Dinhchi extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Sinhvien_model');
      $this->load->model('Ketquahoctap_model');
		}
		function index()
		{
      $status = 2;
      $idmssv = $this->input->get('timkiem_dinhchi');
      $data['svStatus'] = $this->Sinhvien_model->get_infobyStatus($status);
      if ($data['svStatus']) {
      $array_result = [];
      for ($i=0; $i < count($data['svStatus']) ; $i++) {
          $array_result[$data['svStatus'][$i]['MSSV']] = $this->Ketquahoctap_model->get_Diem_SV($data['svStatus'][$i]['MSSV'],$data['svStatus'][$i]['nganhhoc_id'],$data['svStatus'][$i]['khoahoc_id']);
        foreach ($array_result as $MSSV => $value) {
          $tu_dtb=null;
          $mau_dtb=0;
          $dtb = 0;
          $tbtc = 0;
          for ($j=0; $j < count($value) ; $j++) {
            $tu_dtb += ($value[$j]['dvht_tc'] * $value[$j]['diemTB']);
  					$mau_dtb += $value[$j]['dvht_tc'];
  					$dtb = round($tu_dtb/$mau_dtb, 2);
            if ($value[$j]['diemTB'] >= 4.5) {
              $tbtc += $value[$j]['dvht_tc'];
            }
          }
          $data['svStatus'][$i]['dtb'] = $dtb;
          $data['svStatus'][$i]['tbtc'] = $tbtc;
          }
        }
      }
      if ($idmssv) {
        $data['svStatus'] = $this->Sinhvien_model->get_infobystatusbaoluu($idmssv,$status);
      }
      if ($this->input->get('exp')) {
        $this->load->library('PHPExcel');
        $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Danh Sách SV HB');
        $sheet->getColumnDimension("A")->setAutoSize(true);
        $sheet->getColumnDimension("B")->setAutoSize(true);
        $sheet->getColumnDimension("c")->setAutoSize(true);
        $sheet->getColumnDimension("D")->setAutoSize(true);
        $sheet->getColumnDimension("E")->setAutoSize(true);
        $sheet->getColumnDimension("F")->setAutoSize(true);
        $sheet->getColumnDimension("G")->setAutoSize(true);
        $sheet->getColumnDimension("H")->setAutoSize(true);
        $sheet->getColumnDimension("I")->setAutoSize(true);
        $sheet->getColumnDimension("J")->setAutoSize(true);
        $sheet->getColumnDimension("K")->setAutoSize(true);
        $sheet->getColumnDimension("L")->setAutoSize(true);
        $rowcount = 1;
        $sheet->setCellValue('A'.$rowcount, 'MSSV');
        $sheet->setCellValue('B'.$rowcount, 'MÃ HỒ SƠ');
        $sheet->setCellValue('C'.$rowcount, 'HỌ');
        $sheet->setCellValue('D'.$rowcount, 'TÊN');
        $sheet->setCellValue('E'.$rowcount, 'NGÀY SINH');
        $sheet->setCellValue('F'.$rowcount, 'NGÀNH HỌC');
        $sheet->setCellValue('G'.$rowcount, 'KHÓA HỌC');
        $sheet->setCellValue('H'.$rowcount, 'SỐ TÍN CHỈ TÍCH LŨY');
        $sheet->setCellValue('I'.$rowcount, 'ĐIỂM TBTL');
        $sheet->setCellValue('J'.$rowcount, 'TRẠNG THÁI');
        $sheet->setCellValue('K'.$rowcount, 'NGÀY BẮT ĐẦU');
        $sheet->setCellValue('L'.$rowcount, 'LÝ DO');
        //pre($data['svStatus']);
        foreach ($data['svStatus'] as $MSSV => $value) {
          for ($i=0; $i < count($value) ; $i++) {
            $rowcount++;
            $sheet->setCellValue('A'.$rowcount, $value['MSSV']);
            $sheet->setCellValue('B'.$rowcount, $value['MaHS']);
            $sheet->setCellValue('C'.$rowcount, $value['Ho']);
            $sheet->setCellValue('D'.$rowcount, $value['Ten']);
            $sheet->setCellValue('E'.$rowcount, $value['Ngaysinh']);
            $sheet->setCellValue('F'.$rowcount, $value['tennganh']);
            $sheet->setCellValue('G'.$rowcount, $value['tenkhoa']);
            $sheet->setCellValue('H'.$rowcount, $value['tbtc']);
            $sheet->setCellValue('I'.$rowcount, $value['dtb']);
            $sheet->setCellValue('J'.$rowcount, 'Đình Chỉ Học');
            $sheet->setCellValue('K'.$rowcount, $value['ngay_batdau']);
            $sheet->setCellValue('L'.$rowcount, $value['LiDo']);
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
