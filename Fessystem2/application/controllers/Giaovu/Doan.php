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
                    'khoa' => $value[$j]['tenkhoa'],
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
                'khoa' => $value[$j]['tenkhoa'],
                'status'=> 1,
            ];
                continue;
              }
              $data_user_pass[$MSSV] = [
                  'MSSV' => $value[$j]['MSSV'],
                  'Ho' => $value[$j]['Ho'] ,
                  'Ten' => $value[$j]['Ten'] ,
                  'nganh' => $value[$j]['tennganh'],
                  'khoa' => $value[$j]['tenkhoa'],
                  'status'=> 0,
              ];
              continue;
        }
      }
      }
      }
      if ($this->input->get('exp')) {
         $this->load->library('PHPExcel');
          $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Danh Sách SV Làm Đồ Án');
        $rowcount = 1;
        $sheet->setCellValue('A'.$rowcount, 'MSSV');
        $sheet->setCellValue('B'.$rowcount, 'Ho');
        $sheet->setCellValue('C'.$rowcount, 'Ten');
        $sheet->setCellValue('D'.$rowcount, 'nganh');
        $sheet->setCellValue('E'.$rowcount, 'khoa');
        for ($i=0; $i <count($data_user_pass) ; $i++) { 
          while ($row['a'] = mysqli_fetch_array($data_user_pass[$i])){
          $rowcount++;
          $sheet->setCellValue('A'.$rowcount, $row['a']['MSSV']);
          // $sheet->setCellValue('B'.$rowcount, $row['Ho']);
          // $sheet->setCellValue('C'.$rowcount, $row['Ten']);
          // $sheet->setCellValue('E'.$rowcount, $row['khoa']);
        }
        }
        
        $objWriter = new PHPExcel_Writer_Excel2007($objWriter);
        $filename = 'export.xlsx';
        $objWriter->save('filename');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
        header('Content-Lenght: ' . filesize($filename));
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
