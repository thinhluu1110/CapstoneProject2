<?php
Class Diemrenluyen extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Diemrenluyen_model');
      $this->load->model('Nganhhoc_model');
      $this->load->model('Khoahoc_model');
      $this->load->model('Hocki_model');
      $this->load->model('SinhVien_model');
		}
		function index()
		{
      $data['listnganhhoc'] = $this->Nganhhoc_model->get_list();
      $data['listhk'] = $this->Hocki_model->Get_hk();
      $idn = $this->input->post('nganhhoc');
      $idk = $this->input->post('khoahoc');
      $idh = $this->input->post('hocki');
      if($idn)
			{
        $data['listkhoahoc'] = $this->Khoahoc_model->Get_khoabyidn($idn);
        $data['listDiem']=$this->Diemrenluyen_model->filterdrlbyN($idn);
			}
      if($idn && $idk)
      {
      $data['listDiem']=$this->Diemrenluyen_model->filterdrlbyNK($idn,$idk);
      }
      if($idn && $idk && $idh)
      {
      $data['listDiem']=$this->Diemrenluyen_model->filterdrlbyNHK($idn,$idk,$idh);
      }
			$data['temp'] = 'Giaovu/Diemrenluyen/Diemrenluyen';
			$this->load->view('Giaovu/index',$data);
		}
    function import()
    {
      $error  = array(
        'khongchonfile' => '',
        'load' => false,
      );
        
        $this->load->library('PHPExcel');
        $nganh = $this->input->post('manganh');
        $khoahoc = $this->input->post('makhoa');
        $hocki = $this->input->post('mahocki');
        if (!empty($_FILES['file']['tmp_name'])) {
          $file = $_FILES['file']['tmp_name'];
          $objReader = PHPExcel_IOFactory::createReaderForFile($file);
          $objExcel = $objReader->load($file);
          $worksheet = $objExcel->getSheet(0);
          $objReader->setLoadSheetsOnly($worksheet);
          $sheetData = $objExcel->getActiveSheet()->toArray(null,true,true,true);
          $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
          $check_xeploai = false;

          for ($row=4; $row <= $highestRow ; $row++) {
            $break_xeploai = $sheetData[$row]['G'];
          if (empty($break_xeploai)) {
             $check_xeploai = true;
              break;
           } 
          }
          if ($check_xeploai == false) {
            for ($row = 4; $row <= $highestRow; $row ++)
          {
            $break = $sheetData[$row]['A'];
            if (!empty($break)) {
              $mssv = $sheetData[$row]['B'];
              $checksv = $this->SinhVien_model->checkSV($mssv);
              if ($checksv == false) {
                $checkdiem = $this->Diemrenluyen_model->checkDRL($mssv,$hocki);
                if ($checkdiem == false) {
                  $data = array(
                    'MSSV' => $sheetData[$row]['B'],
                    'nganhhoc_id' => $nganh,
                    'khoahoc_id' => $khoahoc,
                    'hocky_id' => $hocki,
                    'diem' => $sheetData[$row]['F'],
                    'xeploai' => $sheetData[$row]['G'],
                  );
                  if($this->Diemrenluyen_model->create($data))
                  {
                    $error['load'] = true;
                  }
                  //else{
                    //$error['load'] = false;
                  //}

                }
                else
                {
                  $id_drl = $checkdiem['drl_id'];

                  $data = array(
                    'diem' => $sheetData[$row]['F'],
                  );
                  if($this->Diemrenluyen_model->update($id_drl,$data))
                  {
                    $error['load'] = true;
                  }
                }
              }
            }
          }
        }
          else{
            $error['load'] = false;
          }
        }
        else{
          $error['khongchonfile'] = 'Vui Lòng Chọn File';
        }
        echo json_encode($error);
      }
}
?>
