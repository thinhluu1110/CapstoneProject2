<?php
Class Baoluu extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Sinhvien_model');
      $this->load->model('Ketquahoctap_model');
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
            'nganhhoc_id' => $value['nganhhoc_id'],
            'khoahoc_id' => $value['khoahoc_id'],
            'Ngaysinh' => $value['Ngaysinh'],
            'Nganh' => $value['tennganh'],
            'tennganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'tenkhoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'ngay_batdau' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'ngay_ketthuc' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'LiDo' => $value['LiDo'],
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
            'nganhhoc_id' => $value['nganhhoc_id'],
            'khoahoc_id' => $value['khoahoc_id'],
            'Ngaysinh' => $value['Ngaysinh'],
            'Nganh' => $value['tennganh'],
            'tennganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'tenkhoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'ngay_batdau' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'ngay_ketthuc' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'LiDo' => $value['LiDo'],
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
            'nganhhoc_id' => $value['nganhhoc_id'],
            'khoahoc_id' => $value['khoahoc_id'],
            'Ngaysinh' => $value['Ngaysinh'],
            'Nganh' => $value['tennganh'],
            'tennganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'tenkhoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'ngay_batdau' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'ngay_ketthuc' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'LiDo' => $value['LiDo'],
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
            'nganhhoc_id' => $value['nganhhoc_id'],
            'khoahoc_id' => $value['khoahoc_id'],
            'Ngaysinh' => $value['Ngaysinh'],
            'Nganh' => $value['tennganh'],
            'tennganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'tenkhoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'ngay_batdau' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'ngay_ketthuc' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'LiDo' => $value['LiDo'],
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
            'nganhhoc_id' => $value['nganhhoc_id'],
            'khoahoc_id' => $value['khoahoc_id'],
            'Ngaysinh' => $value['Ngaysinh'],
            'Nganh' => $value['tennganh'],
            'tennganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'tenkhoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'ngay_batdau' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'ngay_ketthuc' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'LiDo' => $value['LiDo'],
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
            'nganhhoc_id' => $value['nganhhoc_id'],
            'khoahoc_id' => $value['khoahoc_id'],
            'Ngaysinh' => $value['Ngaysinh'],
            'Nganh' => $value['tennganh'],
            'tennganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'tenkhoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'ngay_batdau' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'ngay_ketthuc' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'LiDo' => $value['LiDo'],
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
            'nganhhoc_id' => $value['nganhhoc_id'],
            'khoahoc_id' => $value['khoahoc_id'],
            'Ngaysinh' => $value['Ngaysinh'],
            'Nganh' => $value['tennganh'],
            'tennganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'tenkhoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'ngay_batdau' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'ngay_ketthuc' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'LiDo' => $value['LiDo'],
            'Alert' => $c,
          ];
      }
      $data['svStatus'] = $SV_info_filter;

      }
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
        $sheet->getColumnDimension("M")->setAutoSize(true);
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
        $sheet->setCellValue('L'.$rowcount, 'NGÀY KẾT THÚC');
        $sheet->setCellValue('M'.$rowcount, 'LÝ DO');
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
            $sheet->setCellValue('J'.$rowcount, 'Bảo Lưu');
            $sheet->setCellValue('K'.$rowcount, $value['ngay_batdau']);
            $sheet->setCellValue('L'.$rowcount, $value['ngay_ketthuc']);
            $sheet->setCellValue('M'.$rowcount, $value['LiDo']);
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
