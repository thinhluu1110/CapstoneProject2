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
      $this->load->model('Sinhvien_model');
		}
		function index()
		{
      $data['listnganhhoc'] = $this->Nganhhoc_model->get_list();
      $data['listhk'] = $this->Hocki_model->Get_hk();
      $idn = $this->input->post('nganhhoc');
      $idk = $this->input->post('khoahoc');
      $idh = $this->input->post('hocki');
      $idmssv = $this->input->post('timkiem_drl');
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
      if($idmssv)
      {
        $data['listDiem'] = $this->Diemrenluyen_model->Get_on_infodrl($idmssv);
      }
			$data['temp'] = 'Giaovu/Diemrenluyen/Diemrenluyen';
			$this->load->view('Giaovu/index',$data);
		}
    function import()
    {
      $error  = array(
        'khongchonfile' => '',
        'load' => false,
        'kiemtramssv' => false,
        'kiemtrafile' => false,
        'tontaisv' => false,
      );

        $this->load->library('PHPExcel');
        $nganh = $this->input->post('manganh');
        $khoahoc = $this->input->post('makhoa');
        $hocki = $this->input->post('mahocki');
        if (!empty($_FILES['file']['tmp_name'])) {

          $file = $_FILES['file']['tmp_name'];
          if ($_FILES['file']['type'] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $_FILES['file']['type'] == "application/vnd.ms-excel"  ) {


          $objReader = PHPExcel_IOFactory::createReaderForFile($file);
          $objExcel = $objReader->load($file);
          $worksheet = $objExcel->getSheet(0);
          $objReader->setLoadSheetsOnly($worksheet);
          $sheetData = $objExcel->getActiveSheet()->toArray(null,true,true,true);
          $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
          $check_xeploai = false;
          $check_mssv = false;
          $checksaimssv = true;
          for ($row=4; $row <= $highestRow ; $row++) {
          $break_dongtrong = $sheetData[$row]['A'];
          $break_mssv = $sheetData[$row]['B'];
          if ($break_dongtrong == null) {
            break;
          }
          elseif (empty($break_mssv)) {
            $check_mssv = true;
          }
          $checksv = $this->Sinhvien_model->checkSV($break_mssv);

          if ($checksv == true) {
            $checksaimssv = false;
            break;
          }
        }
        if ($check_mssv == false){
          if ($checksaimssv == false) {
            $error['tontaisv'] = true;
          }
          else {
              for ($row = 4; $row <= $highestRow; $row ++)
              {
              $break = $sheetData[$row]['B'];
              if (!empty($break)) {
                $mssv = $sheetData[$row]['B'];
                $checkdiem = $this->Diemrenluyen_model->checkDRL($mssv,$hocki);
                  if ($checkdiem == false) {
                    $data = array(
                      'MSSV' => trim($sheetData[$row]['B']),
                      'nganhhoc_id' => $nganh,
                      'khoahoc_id' => $khoahoc,
                      'hocky_id' => $hocki,
                      'diem' => trim($sheetData[$row]['F']),
                      'xeploai' => trim($sheetData[$row]['G']),
                    );
                    if($this->Diemrenluyen_model->create($data))
                    {
                      $error['load'] = true;
                    }
                  }
                  else
                  {
                   $id_drl = $checkdiem['drl_id'];
                    $data = array(
                      'diem' => trim($sheetData[$row]['F']),
                    );
                    if($this->Diemrenluyen_model->update($id_drl,$data))
                    {
                      $error['load'] = true;
                    }
                  }
                }
            else {
              break;
            }
          }
        }
        }
          else{
            $error['kiemtramssv'] = true;
          }
        }
        else{
          $error['kiemtrafile'] = true;
        }
        }
        else{
          $error['khongchonfile'] = 'Vui Lòng Chọn File';
        }
        echo json_encode($error);
      }
}
?>
