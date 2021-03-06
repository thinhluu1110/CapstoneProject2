<?php
class Sinhvien extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Nganhhoc_model');
    $this->load->model('Sinhvien_model');
    $this->load->model('Khoahoc_model');
  }

  function index()
  {
    $data['listnganhhoc'] = $this->Nganhhoc_model->get_list();
    $idn = $this->input->post('nganhhoc');
    $idk = $this->input->post('khoahoc');
    $idmssv = $this->input->post('timkiem_thietlapttsv');
    
    if($idn)
    {
      $data['listkhoahoc'] = $this->Khoahoc_model->filter_Khoa($idn);
      $data['listSV'] = $this->Sinhvien_model->getsvbyNganh($idn);
    }
    if ($idn && $idk) {
      $data['listSV'] = $this->Sinhvien_model->getsvbyNK($idn,$idk);
    }
    if($idmssv)
    {
      $data['listSV'] = $this->Sinhvien_model->Getsv_byID($idmssv);
    }
    $data['temp'] = 'Giaovu/Sinhvien/Sinhvien';
    $this->load->view('Giaovu/index',$data);
  }
  // function importSV()
  // {
  //   $error  = array(
  //       'khongchonfile' => '',
  //       'load' => false
  //     );
  //   $nganh=$this->input->post('manganh');
  //   $khoa=$this->input->post('makhoa');
  //   $this->load->library('PHPExcel');
  //   if (!empty($_FILES['file']['tmp_name'])) {
  //     $file = $_FILES['file']['tmp_name'];
  //     $objReader = PHPExcel_IOFactory::createReaderForFile($file);
  //     $objExcel = $objReader->load($file);
  //     $worksheet = $objExcel->getSheet(0);
  //     $objReader->setLoadSheetsOnly($worksheet);
  //     $sheetData = $objExcel->getActiveSheet()->toArray(null,true,true,true);
  //     $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
  //     for ($row = 3; $row <= $highestRow; $row ++)
  //     {
  //       $break = $sheetData[$row]['B'];
  //       if (!empty($break)) {
  //         $sv_id = $sheetData[$row]['B'];
  //         $check = $this->Sinhvien_model->checkSV($sv_id);
  //         if ($check == true) {
  //           $data = array(
  //             'MSSV' => $sheetData[$row]['B'],
  //             'Ho'   => $sheetData[$row]['C'],
  //             'Ten'  => $sheetData[$row]['D'],
  //             'username' => $sheetData[$row]['B'],
  //             'password' => md5($sheetData[$row]['B']),
  //             'nganhhoc_id' => $nganh,
  //             'khoahoc_id' => $khoa,
  //             'SDT' => $sheetData[$row]['AN'],
  //             'Email' => $sheetData[$row]['AO'],
  //             'Tinhtrang' => 0,
  //             'Ngaysinh' => $sheetData[$row]['E'],
  //             'phanquyen_id' => 0,
  //             'Phai'=> $sheetData[$row]['F'],
  //           );
  //           if($this->Sinhvien_model->create($data))
  //           {
  //               $error['load'] = true;
  //           }
  //           //else{
  //               //$error['load'] = false;
  //           //}
  //         }
  //       }
  //       else {
  //         break;
  //       }
  //     }
  //   }
  //   else{
  //     $error['khongchonfile'] = 'Vui Lòng Chọn File';
  //   }
  //   echo json_encode($error);
  // }
  function capnhattinhTrang()
  {
    $id = $this->input->post('MSSV');
    $ngaybd = strtotime($this->input->post('ngay_batdau'));
    $ngaykt = strtotime($this->input->post('ngay_ketthuc'));
    $tinhtrang = $this->input->post('tinhtrang');
    $error = array
          (
              'msg' => '',
              'check' => true
          );
    if ($tinhtrang == 2) {
      if ($ngaykt == null) {
        $data = array(
        'Tinhtrang' => $this->input->post('tinhtrang'),
        'MaHS' => $this->input->post('MaHS'),
        'LiDo' => $this->input->post('LiDo'),
        'ngay_batdau' => $this->input->post('ngay_batdau'),
        'ngay_ketthuc' => $this->input->post('ngay_ketthuc'),
        );
        if($this->Sinhvien_model->update($id,$data)){
          $error['check'] = true;
        }
        else{
          $error['check'] = false;
        }
      }
          }
    
    else{
        if ($ngaybd >= $ngaykt ) {
          $error['msg'] = 'Ngày bắt đầu không được nhỏ hơn ngày kết thúc';
        }
        else{
        $data = array(
        'Tinhtrang' => $this->input->post('tinhtrang'),
        'MaHS' => $this->input->post('MaHS'),
        'LiDo' => $this->input->post('LiDo'),
        'ngay_batdau' => $this->input->post('ngay_batdau'),
        'ngay_ketthuc' => $this->input->post('ngay_ketthuc'),
        );
        if($this->Sinhvien_model->update($id,$data)){
          $error['check'] = true;
        }
        else{
          $error['check'] = false;
        }
      }
    }
    echo json_encode($error);
    
  }
  function capnhat($mssv)
  {
    $data['svInfo'] = $this->Sinhvien_model->get_infobyMSSV($mssv);
    $data['temp'] = 'Giaovu/Sinhvien/Capnhattinhtrang';
    $this->load->view('Giaovu/index',$data);
  }
  function delstatusDC()
  {
    $data = array(
      'msg' => ''
    );
    $mssv = $this->input->post('mssv');
    $datastatus = array(
        'Tinhtrang' => 0,
        'MaHS'  => '',
        'LiDo'  => '',
        'ngay_batdau'  => '',
        'ngay_ketthuc'  => '',
      );
    if ($this->Sinhvien_model->update($mssv,$datastatus)) {
      $data['msg'] = 'Xóa Thành Công';
    }
    echo json_encode($data);
  }
  function delstatusBL()
  {
    $data = array(
      'msg' => ''
    );
    $mssv = $this->input->post('mssv');
    $datastatus = array(
        'Tinhtrang' => 0,
        'MaHS'  => '',
        'LiDo'  => '',
        'ngay_batdau'  => '',
        'ngay_ketthuc'  => '',
      );
    if ($this->Sinhvien_model->update($mssv,$datastatus)) {
      $data['msg'] = 'Xóa Thành Công';
    }
    echo json_encode($data);
  }
  function delstatusTN()
  {
    $data = array(
      'msg' => ''
    );
    $mssv = $this->input->post('mssv');
    $datastatus = array(
        'Tinhtrang' => 0,
        'MaHS'  => '',
        'LiDo'  => '',
        'ngay_batdau'  => '',
        'ngay_ketthuc'  => '',
      );
    if ($this->Sinhvien_model->update($mssv,$datastatus)) {
      $data['msg'] = 'Xóa Thành Công';
    }
    echo json_encode($data);
  }
}


?>
