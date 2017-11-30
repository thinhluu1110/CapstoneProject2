<?php
Class Hocphi extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Nganhhoc_model');
    $this->load->model('Khoahoc_model');
    $this->load->model('Hocki_model');
    $this->load->model('Hocphi_model');
    $this->load->model('Sinhvien_model');
  }
  function index()
  {
    $data = array();
    $data['listnganhhoc'] = $this->Nganhhoc_model->get_list();
    $idn = $this->input->post('nganhhoc');
    $idk = $this->input->post('khoahoc');
    if($idn)
    {
      $data['listkhoahoc'] = $this->Khoahoc_model->Get_khoabyidn($idn);
      $data['listHP']=$this->Hocphi_model->filterhpbyN($idn);
    }
    if($idn && $idk)
    {
      $data['listHP']=$this->Hocphi_model->filterhpbyNK($idn,$idk);
    }
    $data['temp'] = 'Giaovu/Hocphi/Hocphi';
    $this->load->view('Giaovu/index',$data);
  }
  function importHP()
  {
    $data['message'] = array(
        'ImportSucces' => '',
        'ImportFail' => ''
    );
    if(!empty($_FILES['file']['tmp_name']))
    {
      $this->load->library('PHPExcel');
      $file = $_FILES['file']['tmp_name'];

      $objReader = PHPExcel_IOFactory::createReaderForFile($file);
      $objExcel = $objReader->load($file);
      $worksheet = $objExcel->getSheet(0);
      $objReader->setLoadSheetsOnly($worksheet);
      $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
      $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
      $noidung = $sheetData[5]['A'];
      $checkSV = true;

      for ($row=11; $row < $highestRow ; $row++)
      {
        $break = $sheetData[$row]['B'];
        $kiemtraSV = $this->Sinhvien_model->checkSV_Hocphi($break);
        if ($kiemtraSV == false )
        {
          $checkSV = false;
          break;
        }
        }
      if($checkSV == false)
      {
        $data['message']['ImportFail'] = 'Thông tin SV không tồn tại trong hệ thống';
      }
      else
      {
        $delAll = $this->Hocphi_model->delAll();
        for ($row=11; $row < $highestRow ; $row++)
        {
          $data = array(
          'MSSV' => $sheetData[$row]['B'],
          'hocphi_chinh' => $sheetData[$row]['G'],
          'hocphi_hoclai' => $sheetData[$row]['H'],
          'hocphi_tong' => $sheetData[$row]['F'],
          'noidung' =>$noidung,
          );
          if($this->Hocphi_model->create($data))
          {
            $data['message']['ImportSucces'] = 'Thêm mới dữ liệu thành công';
          }
        }
      }
    }
      else
          {
           $data['message']['ImportFail'] = 'Xin vui lòng chọn file ';
          }

  echo json_encode($data);

}

}
?>
