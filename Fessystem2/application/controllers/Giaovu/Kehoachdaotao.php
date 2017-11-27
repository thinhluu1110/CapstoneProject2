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
        'load' => false
      );
        $this->load->library('PHPExcel');
        if (!empty($_FILES['file']['tmp_name'])) {
        $nganh=$this->input->post('manganh');
        $khoa=$this->input->post('makhoa');
        $check = $this->Kehoachdaotao_model->checkKHDT($nganh,$khoa);
        if ($check == false) {
          $error['tontaikhdt'] = "Kế Hoạch Đào Tạo Cho Khóa Này Đã Tồn Tại";
        }
        else {
          $file = $_FILES['file']['tmp_name'];
          $objReader = PHPExcel_IOFactory::createReaderForFile($file);
          $objExcel = $objReader->load($file);
          $worksheet = $objExcel->getSheet(0);
          $objReader->setLoadSheetsOnly($worksheet);
          $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);

          $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
          // echo $highestRow;
          // exit;
          $maN=$this->Nganhhoc_model->Get_nganhbyid($nganh);
          $maK=$this->Khoahoc_model->Get_khoabyid($khoa);
          $mamonincre = 1;
          for ($row = 6; $row <= $highestRow; $row ++) {
            $empty = $sheetData[$row]['B'];
            if ($empty != 'null') {
              $mamon = $maN['ma_nganhhoc']."K".$maK['tenkhoa']."M".$mamonincre;
              $mamonincre++;
              $monphu = 0;
              $dataKHDT = array(
                'monhoc_id' => $mamon,
                'TenMH' => $sheetData[$row]['B'],
                'dvht_tc' => $sheetData[$row]['C'],
                'tongso' => $sheetData[$row]['D'],
                'lythuyet' => $sheetData[$row]['E'],
                'thuchanh' => $sheetData[$row]['G'],
                'baitap' => $sheetData[$row]['F'],
                'baitaplon' => $sheetData[$row]['H'],
                'doAn' => $sheetData[$row]['I'],
                'khoaluan' => $sheetData[$row]['J'],
                'nganhhoc_id' => $nganh,
                'hocki_id' => $sheetData[$row]['K'],
                'khoahoc_id' => $khoa,
                'monphu' => $monphu,
              );
              if($this->Kehoachdaotao_tam_model->create($dataKHDT))
              {
                $error['load'] = true;
              }
            }
            else {
              break;
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
            'check' => true,
          );
          $id = $this->input->post('khdt_id');
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

              echo json_encode($error);
        }
        function Delmon_KHDT()
        {
          $error = array(
            'check' => true,
          );
          $id = $this->input->post('khdt_id');
          //pre($id);
          $this->Kehoachdaotao_model->delete($id);
            $error['check'] = true;

          echo json_encode($error);
        }
	}

 ?>
