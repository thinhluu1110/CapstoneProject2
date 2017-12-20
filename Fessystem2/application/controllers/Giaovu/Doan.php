<?php
Class Doan extends MY_Controller
{
    function __construct()
    {
      parent::__construct();
      $this->load->model('Khoahoc_model');
      $this->load->model('Dieukiendoan_model');
      $this->load->model('Nganhhoc_model');
      $this->load->model('Sinhvien_model');
      $this->load->model('Ketquahoctap_model');
    }
    function index()
    {
      $data_user_pass = [];
      $listnganhhoc = $this->Nganhhoc_model->get_list();
      $idn = $this->input->get('nganhhoc');
      $idk = $this->input->get('khoahoc');
      if($idn)
      {
      $data['listkhoahoc'] = $this->Dieukiendoan_model->getkhoadkda($idn);
      }
      if($idn && $idk)
      {
      $data['listDSDA']=$this->Sinhvien_model->getsvby_nganhkhoa($idn,$idk);
      $data['listDKDA']=$this->Dieukiendoan_model->getdkby_nganhkhoa($idn,$idk);
      if (count($data['listDKDA'])>0) {
      $data['listDKDA'][0]['moncam'] = explode(',',$data['listDKDA'][0]['moncam']);
      }
      for ($i=0; $i < count($data['listDSDA']) ; $i++) {
        $array_result[$data['listDSDA'][$i]['MSSV']][] = $data['listDSDA'][$i];
      }

      if (isset($array_result)) {
      foreach ($array_result as $MSSV => $value) {
        $tongmonno = 0;
        for ($j=0; $j <count($value) ; $j++) {
          if($value[$j]['diemTB'] < 4.5 ){
              $tongmonno++;
              if(array_key_exists($value[$j]['monhoc_id'],$data['listDKDA'][0]['moncam'])){
                $data_user_pass[$MSSV] = [
                    'MSSV' => $value[$j]['MSSV'],
                    'Ho' => $value[$j]['Ho'] ,
                    'Ten' => $value[$j]['Ten'] ,
                    'nganh' => $value[$j]['tennganh'],
                    'nganhhoc_id' => $value[$j]['nganhhoc_id'],
                    'khoa' => $value[$j]['tenkhoa'],
                    'khoahoc_id' => $value[$j]['khoahoc_id'],
                    'Ngaysinh' => $value[$j]['Ngaysinh'],
                    'status'=> 1,
                ];
                      continue;
                  }
            }
          if ($tongmonno >= $data['listDKDA'][0]['max_monno'] ) {
            $data_user_pass[$MSSV] = [
                'MSSV' => $value[$j]['MSSV'],
                'Ho' => $value[$j]['Ho'] ,
                'Ten' => $value[$j]['Ten'] ,
                'nganh' => $value[$j]['tennganh'],
                'nganhhoc_id' => $value[$j]['nganhhoc_id'],
                'khoa' => $value[$j]['tenkhoa'],
                'khoahoc_id' => $value[$j]['khoahoc_id'],
                'Ngaysinh' => $value[$j]['Ngaysinh'],
                'status'=> 1,
            ];
                continue;
              }
              $data_user_pass[$MSSV] = [
                  'MSSV' => $value[$j]['MSSV'],
                  'Ho' => $value[$j]['Ho'] ,
                  'Ten' => $value[$j]['Ten'] ,
                  'nganh' => $value[$j]['tennganh'],
                  'nganhhoc_id' => $value[$j]['nganhhoc_id'],
                  'khoa' => $value[$j]['tenkhoa'],
                  'khoahoc_id' => $value[$j]['khoahoc_id'],
                  'Ngaysinh' => $value[$j]['Ngaysinh'],
                  'status'=> 0,
              ];
              continue;
        }
      }
      }
      if ($data_user_pass) {
      $array_result = [];
      foreach ($data_user_pass as $key => $value) {
        $array_result[] = $this->Ketquahoctap_model->get_Diem_SV($value['MSSV'],$value['nganhhoc_id'],$value['khoahoc_id']);
        foreach ($array_result as $MSSV => $value) {
          $tu_dtb=null;
          $mau_dtb=0;
          $dtb = 0;
          $tbtc = 0;
          $tenmonno = '';
          for ($j=0; $j < count($value) ; $j++) {
            $tu_dtb += ($value[$j]['dvht_tc'] * $value[$j]['diemTB']);
            $mau_dtb += $value[$j]['dvht_tc'];
            $dtb = round($tu_dtb/$mau_dtb, 2);
            if ($value[$j]['diemTB'] >= 4.5) {
              $tbtc += $value[$j]['dvht_tc'];
            }
            if ($value[$j]['diemTB'] <= 4.5) {
              $tenmonno .= $value[$j]['TenMH'].',';
            }
          }
          $data_user_pass[$key]['dtb'] = $dtb;
          $data_user_pass[$key]['tbtc'] = $tbtc;
          $data_user_pass[$key]['tenmonno'] = $tenmonno;
          }
        }
      }
      }
      if ($this->input->get('exp')) {
        $this->load->library('PHPExcel');
        $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('DS SV Làm Đồ Án');
        $sheet->getColumnDimension("A")->setAutoSize(true);
        $sheet->getColumnDimension("B")->setAutoSize(true);
        $sheet->getColumnDimension("c")->setAutoSize(true);
        $sheet->getColumnDimension("D")->setAutoSize(true);
        $sheet->getColumnDimension("E")->setAutoSize(true);
        $sheet->getColumnDimension("F")->setAutoSize(true);
        $sheet->getColumnDimension("G")->setAutoSize(true);
        $sheet->getColumnDimension("H")->setAutoSize(true);
        $sheet->getColumnDimension("I")->setAutoSize(true);
        $rowcount = 1;
        $sheet->setCellValue('A'.$rowcount, 'MSSV');
        $sheet->setCellValue('B'.$rowcount, 'HỌ');
        $sheet->setCellValue('C'.$rowcount, 'TÊN');
        $sheet->setCellValue('D'.$rowcount, 'NGÀY SINH');
        $sheet->setCellValue('E'.$rowcount, 'NGÀNH HỌC');
        $sheet->setCellValue('F'.$rowcount, 'KHÓA HỌC');
        $sheet->setCellValue('G'.$rowcount, 'ĐIỂM TBTL');
        $sheet->setCellValue('H'.$rowcount, 'SỐ TCTL');
        $sheet->setCellValue('I'.$rowcount, 'MÔN NỢ');
        foreach ($data_user_pass as $MSSV => $value) {
          for ($i=0; $i <count($value) ; $i++) {
            if ($value['status'] == 0) {
              $rowcount++;
              $sheet->setCellValue('A'.$rowcount, $value['MSSV']);
              $sheet->setCellValue('B'.$rowcount, $value['Ho']);
              $sheet->setCellValue('C'.$rowcount, $value['Ten']);
              $sheet->setCellValue('D'.$rowcount, $value['Ngaysinh']);
              $sheet->setCellValue('E'.$rowcount, $value['nganh']);
              $sheet->setCellValue('F'.$rowcount, $value['khoa']);
              $sheet->setCellValue('G'.$rowcount, $value['dtb']);
              $sheet->setCellValue('H'.$rowcount, $value['tbtc']);
              $sheet->setCellValue('I'.$rowcount, $value['tenmonno']);
            }
          break;
        }
        }
        $objExcel->createSheet();
        $objExcel->setActiveSheetIndex(1);
        $sheet = $objExcel->getActiveSheet()->setTitle('DS SV Không Được Làm Đồ Án');
        $sheet->getColumnDimension("A")->setAutoSize(true);
        $sheet->getColumnDimension("B")->setAutoSize(true);
        $sheet->getColumnDimension("c")->setAutoSize(true);
        $sheet->getColumnDimension("D")->setAutoSize(true);
        $sheet->getColumnDimension("E")->setAutoSize(true);
        $sheet->getColumnDimension("F")->setAutoSize(true);
        $sheet->getColumnDimension("G")->setAutoSize(true);
        $sheet->getColumnDimension("H")->setAutoSize(true);
        $sheet->getColumnDimension("I")->setAutoSize(true);
        $rowcount = 1;
        $sheet->setCellValue('A'.$rowcount, 'MSSV');
        $sheet->setCellValue('B'.$rowcount, 'HỌ');
        $sheet->setCellValue('C'.$rowcount, 'TÊN');
        $sheet->setCellValue('D'.$rowcount, 'NGÀY SINH');
        $sheet->setCellValue('E'.$rowcount, 'NGÀNH HỌC');
        $sheet->setCellValue('F'.$rowcount, 'KHÓA HỌC');
        $sheet->setCellValue('G'.$rowcount, 'ĐIỂM TBTL');
        $sheet->setCellValue('H'.$rowcount, 'SỐ TCTL');
        $sheet->setCellValue('I'.$rowcount, 'MÔN NỢ');
        foreach ($data_user_pass as $MSSV => $value) {
          for ($i=0; $i <count($value) ; $i++) {
            if ($value['status'] == 1) {
              $rowcount++;
              $sheet->setCellValue('A'.$rowcount, $value['MSSV']);
              $sheet->setCellValue('B'.$rowcount, $value['Ho']);
              $sheet->setCellValue('C'.$rowcount, $value['Ten']);
              $sheet->setCellValue('D'.$rowcount, $value['Ngaysinh']);
              $sheet->setCellValue('E'.$rowcount, $value['nganh']);
              $sheet->setCellValue('F'.$rowcount, $value['khoa']);
              $sheet->setCellValue('G'.$rowcount, $value['dtb']);
              $sheet->setCellValue('H'.$rowcount, $value['tbtc']);
              $sheet->setCellValue('I'.$rowcount, $value['tenmonno']);
            }
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
      $data['listsvpassdk'] = $data_user_pass;
      $data['listnganhhoc'] = $listnganhhoc;
      $data['temp'] = 'Giaovu/Doan/Doan';
      $this->load->view('Giaovu/index',$data);
    }
  }
 ?>
