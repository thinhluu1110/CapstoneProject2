<?php
Class Kehoachdaotao extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Kehoachdaotao_model');
      $this->load->model('Kehoachdaotao_tam_model');
      $this->load->model('Monhoc_model');
      $this->load->model('Khoahoc_model');
      $this->load->model('Nganhhoc_model');
      $this->load->model('Hocki_model');
      $this->load->model('Chuongtrinhdaotao_model');
		}
		function index()
		{
      
      $listhocki = $this->Hocki_model->get_list();
      $data['listhocki'] = $listhocki;
      $listnganhhoc = $this->Nganhhoc_model->get_list();
      $idn = $this->input->get('nganhhoc');
      $idk = $this->input->get('khoahoc');
      $data['listmonhoc'] = $this->Monhoc_model->get_monhoc();
      if($idn)
			{
        $data['listkhoahoc'] = $this->Khoahoc_model->Get_khoabyidn($idn);
			}
      if($idn && $idk)
      {
      $data['listCTDT']=$this->Kehoachdaotao_model->filterKHDT($idk,$idn);
      }
      $data['listnganhhoc'] = $listnganhhoc;
      $data['temp'] = 'Giaovu/Kehoachdaotao/Kehoachdaotao';
			$this->load->view('Giaovu/index',$data);
		}
    function review_khdt()
		{
      $listnganhhoc = $this->Nganhhoc_model->get_list();
      $data['listreview']=$this->Kehoachdaotao_tam_model->reviewkhdt();
      $data['listnganhhoc'] = $listnganhhoc;
      $this->load->view('Giaovu/Kehoachdaotao/Kehoachdaotao_review',$data);
		}
    function reloadKHDT()
    {
      $data['listCTDT']=$this->Kehoachdaotao_model->filterKHDT($idk,$idn);
      $this->load->view('Giaovu/Kehoachdaotao/Kehoachdaotao_review',$data);
    }
    function get_khoahocbyNganh()
    {
      $id = $this->input->post('nganhhoc_id');
      $khoahoc = $this->Khoahoc_model->filter_Khoa($id);
      if (count($khoahoc)>0) {
        $khoa_selec_box = '';
        $khoa_selec_box .= '<option value = "">--- Chọn Khóa Học ---</option>';
        foreach ($khoahoc as  $row) {
          $khoa_selec_box .= '<option value = "'.$row['khoahoc_id'].'">'.$row['tenkhoa'].'</option>';
        }
        echo json_encode($khoa_selec_box);
      }


    }
    function khdt_info()
    {
      $id = $this->uri->segment(4);
      $input = array();
      $listkhoahoc = $this->Khoahoc_model->get_list($input);
      $listhocki = $this->Hocki_model->get_list($input);
      $listnganhhoc = $this->Nganhhoc_model->get_list($input);
      $data['listkhoahoc'] = $listkhoahoc;
      $data['listnganhhoc'] = $listnganhhoc;
      $data['listhocki'] = $listhocki;
      $data['khdt_info'] = $this->Kehoachdaotao_model->khdt_info($id);
      $id_khdt=$data['khdt_info']['khdt_id'];
      if ($this->input->post('submit')) {
        $monhoc_id = $this->input->post('mamon');
        $tenmon = $this->input->post('tenmon');
        $id_mon = $this->Monhoc_model->checkmonHoc($monhoc_id,$tenmon);
        $dataKHDT = array(
        'monhoc_id' => $id_mon['monhoc_id'],
        'dvht_tc' => $this->input->post('dvht_tc'),
        'tongso' => $this->input->post('tongso'),
        'lythuyet' => $this->input->post('lythuyet'),
        'thuchanh' => $this->input->post('thuchanh'),
        'baitap' => $this->input->post('baitap'),
        'baitaplon' => $this->input->post('baitaplon'),
        'doAn' => $this->input->post('doan'),
        'khoaluan' => $this->input->post('khoaluan'),
        'nganhhoc_id' => $this->input->post('nganhhoc'),
        'hocki_id' => $this->input->post('hocki'),
        'khoahoc_id' => $this->input->post('khoahoc'),
      );
      if($this->Kehoachdaotao_model->update($id_khdt,$dataKHDT))
      {
          //tạo ra nội dung thông báo
          $this->session->set_flashdata('message', 'Sửa dữ liệu thành công');
      }else{
          $this->session->set_flashdata('message', 'Không sửa được');
      }
      redirect(base_url().'Giaovu/Kehoachdaotao/index');
      }
      $this->load->view('Giaovu/Kehoachdaotao/Editktdt',$data);
    }
    function importCTDT()
    {
      $error  = array(
        'tontaikhdt' => '',
        'khongchonfile' => '',
        'load' => false,
        'kiemtrafile' => false,
        'kiemtradulieu' => false,
        'tontaictdt' => '',
      );
      $this->load->library('PHPExcel');
      if (!empty($_FILES['file']['tmp_name'])) {
        $nganh=$this->input->post('manganh');
        $khoa=$this->input->post('makhoa');
        $check_mamon = false;
        $checkctdt = $this->Chuongtrinhdaotao_model->checkCTDT($nganh,$khoa);
        if ($checkctdt == true) {
          $error['tontaictdt'] = "CTDT của khóa này chưa tồn tại";
        }
        else{
          $check = $this->Kehoachdaotao_model->checkKHDT($nganh,$khoa);
          if ($check == false) {
            $error['tontaikhdt'] = "Kế Hoạch Đào Tạo Cho Khóa Này Đã Tồn Tại";
          }
          else {
            $file = $_FILES['file']['tmp_name'];
            if ($_FILES['file']['type'] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $_FILES['file']['type'] == "application/vnd.ms-excel" )
            {
              $objReader = PHPExcel_IOFactory::createReaderForFile($file);
              $objExcel = $objReader->load($file);
              $worksheet = $objExcel->getSheet(0);
              $objReader->setLoadSheetsOnly($worksheet);
              $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
              
              
              $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
              // echo $highestRow;
              // exit;
              
              // for ($row = 6; $row <= $highestRow; $row++) { 
              //   //$break_dongtrong = $sheetData[$row]['A'];
              //   $break_mamon = $sheetData[$row]['B'];
              //   $break_tenmon = $sheetData[$row]['C'];
              //   $break_dvht = $sheetData[$row]['D'];
              //   $break_ts = $sheetData[$row]['E'];
              //   $break_lt = $sheetData[$row]['F'];
              //   $break_bt = $sheetData[$row]['G'];
              //   $break_th = $sheetData[$row]['H'];
              //   $break_btl = $sheetData[$row]['I'];
              //   $break_da = $sheetData[$row]['J'];
              //   $break_kl = $sheetData[$row]['K'];
              //   $break_hocki = $sheetData[$row]['L'];
              //   if (is_null($break_mamon) || is_null($break_tenmon) || is_null($break_hocki) || is_null($break_dvht) || is_null($break_ts) || is_null($break_lt) || is_null($break_bt) || is_null($break_th) || is_null($break_btl) || is_null($break_da) || is_null($break_kl) ) {
              //     $check_mamon = true;
              //     break;
              //   }
              // }
              // if($check_mamon == false)
              // {
          for ($row = 6; $row <= $highestRow; $row ++) {
              $dataKHDT = array(
                'monhoc_id' => $sheetData[$row]['B'],
                'TenMH' => $sheetData[$row]['C'],
                'dvht_tc' => $sheetData[$row]['D'],
                'tongso' => $sheetData[$row]['E'],
                'lythuyet' => $sheetData[$row]['F'],
                'thuchanh' => $sheetData[$row]['H'],
                'baitap' => $sheetData[$row]['G'],
                'baitaplon' => $sheetData[$row]['I'],
                'doAn' => $sheetData[$row]['J'],
                'khoaluan' => $sheetData[$row]['K'],
                'nganhhoc_id' => $nganh,
                'hocki_id' => $sheetData[$row]['L'],
                'khoahoc_id' => $khoa,
              );
              if($this->Kehoachdaotao_tam_model->create($dataKHDT))
              {
                $error['load'] = true;
              }
            }
          // }
          // else{
          //   $error['kiemtradulieu'] = true;
          // }
          }
          else{
            $error['kiemtrafile'] = true;
          }
        }
      }
      }
      else {
          $error['khongchonfile'] = 'Vui Lòng Chọn File';
      }
      echo json_encode($error);
          //
          }
        function Add()
        {
            $error['thanhcong'] = '';
            $error['thatbai'] = '';
            $error['tontaimon'] = '';
            $monhoc_id = $this->input->post('tenmon');
            $khoahoc_id = $this->input->post('khoahoc');
            $nganhhoc_id = $this->input->post('nganhhoc');
            $error['check'] = $this->Kehoachdaotao_model->check_mon_khdt($monhoc_id,$khoahoc_id,$nganhhoc_id);
            if (empty($error['check'])) {
              $dataKHDT = array(
              'monhoc_id' => $monhoc_id,
              'dvht_tc' => $this->input->post('dvht_tc'),
              'tongso' => $this->input->post('tongso'),
              'lythuyet' => $this->input->post('lythuyet'),
              'thuchanh' => $this->input->post('thuchanh'),
              'baitap' => $this->input->post('baitap'),
              'baitaplon' => $this->input->post('baitaplon'),
              'doAn' => $this->input->post('doan'),
              'khoaluan' => $this->input->post('khoaluan'),
              'nganhhoc_id' => $this->input->post('nganhhoc'),
              'hocki_id' => $this->input->post('hocki'),
              'khoahoc_id' => $this->input->post('khoahoc'),
            );
            if($this->Kehoachdaotao_model->create($dataKHDT))
            {
                //tạo ra nội dung thông báo
                $error['thanhcong'] = 'Thêm Thành Công';
            }else{
                $error['thatbai'] = 'Thêm Thất Bại';
            }

            }
            else {
              $tenmon = $error['check']['TenMH'];
              $hk = $error['check']['hocki_id'];
              $error['tontaimon'] = "Đã Tồn Tại Môn $tenmon Ở Học Kì $hk";
            }
              echo json_encode($error);
        }
        function Del()
        {
            $id = $this->uri->segment(4);
            $data['khdt_info'] = $this->Kehoachdaotao_model->khdt_info($id);
            $id_khdt=$data['khdt_info']['khdt_id'];
            if ($this->input->post('submit'))
            {
              if($this->Kehoachdaotao_model->delete($id_khdt))
              {
                  //tạo ra nội dung thông báo
                  $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
              }else{
                  $this->session->set_flashdata('message', 'Không xóa được');
              }
              redirect(base_url().'Giaovu/Kehoachdaotao/index');
            }
            $this->load->view('Giaovu/Kehoachdaotao/Delete',$data);
        }
        function khdt_Chitiet($idk,$idn)
    		{
    			$data = array();
          //Lấy danh sách khóa học
          $listnganhhoc = $this->Nganhhoc_model->get_list();
          $data['listmonhoc'] = $this->Monhoc_model->get_monhoc();
          if($idn && $idk)
          {
          $data['listCTDT']=$this->Kehoachdaotao_model->filterKHDT($idk,$idn);
          }
          $data['listnganhhoc'] = $listnganhhoc;
          $data['temp'] = 'Giaovu/Kehoachdaotao/Kehoachdaotao';
    			$this->load->view('Giaovu/index',$data);
    		}
        function run_sp(){
          $this->Kehoachdaotao_model->run_sp();
          $error['check'] = false;
          $data['listreview']=$this->Kehoachdaotao_tam_model->reviewkhdt();
          if ($data['listreview'] == false)
          {
            $error['check'] = true;
          }
          else
          {
            $error['check'] = false;
          }
          echo json_encode($error);
        }
        function cancel_sp(){
          $this->Kehoachdaotao_model->cancel_sp();
          redirect(base_url().'Giaovu/Chuongtrinhdaotao/index');
        }
        function getmon_khdt()
        {
        $id = $this->input->post('khdt_id');
        //$data['listnganhhoc'] = $this->Nganhhoc_model->get_list();
      
        $data['khdt_info'] = $this->Kehoachdaotao_model->Getmon_khdtID($id);
        echo json_encode($data);
        }
         function editmon_khdt()
        {
          $error = array(
            'check' => false,
            'checkhk' => false,
            'msg' => '',
          );
          $id = $this->input->post('khdt_id');
          $value = $this->Kehoachdaotao_model->khdt_info($id);
           $nganhhoc = $value['nganhhoc_id'];
          $khoahoc = $value['khoahoc_id'];
          $hocki = $value['hocki_id'];
          $monhoc = $value['monhoc_id'];
          $checkdiem = $this->Kehoachdaotao_model->Delmon_checkkhdt($id,$nganhhoc,$khoahoc,$hocki,$monhoc);
          if (count($checkdiem) > 0) {
          $error['msg'] = 'Đã Có Dữ Liệu Kết Quả Học Tập Cho Kế Hoạch Đào Tạo Này';
          }
          else{
            $nganhhoc1 = $this->input->post('nganhhoc');
            $khoahoc1 = $this->input->post('khoahoc');
            $hocki1 = $this->input->post('hocki_id');
            //$monhoc1 = $this->input->post('monhoc_id');
            $checkdiemhk = $this->Kehoachdaotao_model->Editmon_checkkhdt($nganhhoc1,$khoahoc1,$hocki1);
            if (count($checkdiemhk) > 0) {
                $error['msg'] = 'Học Kì Vùa Chọn Đã Kết THúc';
              }
              else{
              $dataKHDT = array(
              //'monhoc_id' => $this->input->post('monhoc_id'),
              'dvht_tc' => $this->input->post('dvht'),
              'tongso' => $this->input->post('tongso'),
              'lythuyet' => $this->input->post('lythuyet'),
              'thuchanh' => $this->input->post('thuchanh'),
              'baitap' => $this->input->post('baitap'),
              'baitaplon' => $this->input->post('baitaplon'),
              'doAn' => $this->input->post('doAn'),
              'khoaluan' => $this->input->post('khoaluan'),
              //'nganhhoc_id' => $this->input->post('nganhhoc_id'),
              'hocki_id' => $this->input->post('hocki_id'),
              //'khoahoc_id' => $this->input->post('khoahoc_id'),
            );
            if($this->Kehoachdaotao_model->update($id,$dataKHDT))
            {
                //tạo ra nội dung thông báo
                $error['check'] = true;
            }else{
                $error['check'] = false;
            }
            }
          }
              echo json_encode($error);
        }
        function Delmon_KHDT()
        {
          $error = array(
            'check' => false,
            'msg' => '',
          );
          $id = $this->input->post('khdt_id');
          $value = $this->Kehoachdaotao_model->khdt_info($id);
          $nganhhoc = $value['nganhhoc_id'];
          $khoahoc = $value['khoahoc_id'];
          $hocki = $value['hocki_id'];
          $monhoc = $value['monhoc_id'];
          $checkdiem = $this->Kehoachdaotao_model->Delmon_checkkhdt($id,$nganhhoc,$khoahoc,$hocki,$monhoc);
        if (count($checkdiem) > 0) {
          $error['msg'] = 'Đã Có Dữ Liệu Kết Quả Học Tập Cho Kế Hoạch Đào Tạo Này';
        }
        else
        {
          $this->Kehoachdaotao_model->delete($id);
            $error['check'] = true;
        }
          echo json_encode($error); 
        }
	}

 ?>
