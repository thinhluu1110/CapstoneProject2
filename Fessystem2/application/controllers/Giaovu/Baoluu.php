<?php
Class Baoluu extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Sinhvien_model');
      date_default_timezone_set('Asia/Ho_Chi_Minh');
		}
		function index()
		{
      $time = $this->input->get('TimeBL');
      $status = 3;
      $SV_info_filter = [];
       $idmssv = $this->input->get('timkiem_baoluu');
      $data['svStatus'] = $this->Sinhvien_model->get_infobyStatus($status);
       if ($idmssv) {
        $data['svStatus'] = $this->Sinhvien_model->get_infobystatusbaoluu($idmssv,$status);
      } 
      if ($time == '12') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c > 365) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '12to9') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 365 && $c>273) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '9to6') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 273 && $c>183) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '6to3') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 183 && $c>93) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '3to1') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 93 && $c>30) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '1') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 30) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;

      }
      else {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
      }
      $data['svStatus'] = $SV_info_filter;

      }

     
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
        $sheet->setCellValue('F'.$rowcount, 'Ngày bắt đầu');
        $sheet->setCellValue('G'.$rowcount, 'Ngày kết thúc');
        $sheet->setCellValue('H'.$rowcount, 'Lý do');
        foreach ($SV_info_filter as $MSSV => $value) {
          for ($i=0; $i < count($value) ; $i++) { 
            $rowcount++;
            $sheet->setCellValue('A'.$rowcount, $value['MSSV']);
            $sheet->setCellValue('B'.$rowcount, $value['MaHS']);
            $sheet->setCellValue('C'.$rowcount, $value['Ho'].' '.$value['Ten']);
            $sheet->setCellValue('D'.$rowcount, $value['Nganh']);
            $sheet->setCellValue('E'.$rowcount, $value['Khoa']);
            $sheet->setCellValue('F'.$rowcount, $value['Ngaybd']);
            $sheet->setCellValue('G'.$rowcount, $value['Ngaykt']);
            $sheet->setCellValue('H'.$rowcount, $value['Lido']);
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
			$data['temp'] = 'Giaovu/Baoluu/Baoluu';
			$this->load->view('Giaovu/index',$data);
	}
}
 ?>
