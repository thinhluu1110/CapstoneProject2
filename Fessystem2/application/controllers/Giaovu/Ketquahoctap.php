<?php
	Class Ketquahoctap extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Ketquahoctap_model');
			$this->load->model('Ketquahoctap_tam_model');
			$this->load->model('Monhoc_model');
			$this->load->model('Lophoc_model');
			$this->load->model('Nganhhoc_model');
			$this->load->model('Diemrenluyen_model');
			$this->load->model('Sinhvien_model');
		}
		function index()
		{
			$data = array();
			//get lophoc list
			$input = array();
			$data['listmon'] = $this->Monhoc_model->get_monhoc();
			$monhoc = $this->input->get('monhoc');
			$lophoc = $this->input->get('lophoc');
			$idmssv = $this->input->get('timkiem_kqht');
			if($monhoc)
			{
				$data['listlophoc'] = $this->Lophoc_model->get_lop_mon($monhoc);
			}
			if ($lophoc && $monhoc) {
				$data['listDiem'] = $this->Ketquahoctap_model->get_Diem_kqht($lophoc,$monhoc);
			}
			//pre($data['listDiem']);
			 if ($this->input->get('exp')) {
		        $this->load->library('PHPExcel');
		        $objExcel = new PHPExcel;
		        $objExcel->setActiveSheetIndex(0);
		        $sheet = $objExcel->getActiveSheet()->setTitle('Danh Sách Điểm SV');
		        $rowcount = 1;
		        $sheet->setCellValue('A'.$rowcount, 'Mã sinh viên');
		        $sheet->setCellValue('B'.$rowcount, 'Họ');
		        $sheet->setCellValue('C'.$rowcount, 'Tên');
		        $sheet->setCellValue('D'.$rowcount, 'Ngày sinh');
		        $sheet->setCellValue('E'.$rowcount, 'Lớp');
		        $sheet->setCellValue('F'.$rowcount, 'Mã Ngành');
		        $sheet->setCellValue('G'.$rowcount, 'Mã Môn');
		        $sheet->setCellValue('H'.$rowcount, 'Tên Môn');
		        $sheet->setCellValue('I'.$rowcount, 'ĐTB');
		        foreach ($data['listDiem'] as $row => $value) {
		          for ($i=0; $i < count($value) ; $i++) {
		            $rowcount++;
		            $sheet->setCellValue('A'.$rowcount, $value['sinhvien_id']);
		            $sheet->setCellValue('B'.$rowcount, $value['Ho']);
		            $sheet->setCellValue('C'.$rowcount, $value['Ten']);
		            $sheet->setCellValue('D'.$rowcount, $value['Ngaysinh']);
		            $sheet->setCellValue('E'.$rowcount, $value['tenlop']);
		            $sheet->setCellValue('F'.$rowcount, $value['ma_nganhhoc']);
		            $sheet->setCellValue('G'.$rowcount, $value['MaMH']);
		            $sheet->setCellValue('H'.$rowcount, $value['TenMH']);
		            $sheet->setCellValue('I'.$rowcount, $value['diemTB']);
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
		      if ($idmssv) {
		      	$data['listDiem'] = $this->Ketquahoctap_model->get_Diem_timkiemkqht($idmssv);
		      }
			$data['temp'] = 'Giaovu/Ketquahoctap/Ketquahoctap';
			$this->load->view('Giaovu/index', $data);
		}

		function importKQHT()
		{
			$error  = array(
				'khongchonfile' => '',
				'load' => false,
				'kiemtrafile' => '',
			);
			//$hocki=$this->input->post('hocki');
			$this->load->library('PHPExcel');
			if (!empty($_FILES['file']['tmp_name'])) {
				$file = $_FILES['file']['tmp_name'];
				if ($_FILES['file']['type'] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $_FILES['file']['type'] == "application/vnd.ms-excel"  )
				{
					$objReader = PHPExcel_IOFactory::createReaderForFile($file);
				$objExcel = $objReader->load($file);
				$worksheet = $objExcel->getSheet(0);
				$objReader->setLoadSheetsOnly($worksheet);
				$sheetData = $objExcel->getActiveSheet()->toArray(null,true,true,true);
				$highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
				$load = false;
				$lan2 = 0;
				for ($row=2; $row <= $highestRow ; $row++)
				{
					$break = $sheetData[$row]['A'];
					if ( $break != null) {
						if ( is_null($sheetData[$row]['M'])) {
							$lan2 = null;
						}
						else{
							$lan2 = trim($sheetData[$row]['M']);
						}
						$data = array(
							'sinhvien_id' => trim($sheetData[$row]['B']),
							'ho' => trim($sheetData[$row]['C']),
							'ten' => trim($sheetData[$row]['D']),
							'ngaysinh' => trim($sheetData[$row]['E']),
							'nganhhoc_id' => trim($sheetData[$row]['G']),
							'lophoc_id' => trim($sheetData[$row]['F']),
							'monhoc_id' => trim($sheetData[$row]['H']),
							'TenMH' => trim($sheetData[$row]['I']),
							'chuyencan' => trim($sheetData[$row]['J']),
							'giuaki' => trim($sheetData[$row]['K']),
							'lan1' => trim($sheetData[$row]['L']),
							'lan2' => $lan2,
							'diemTB' => trim($sheetData[$row]['N']),
							'trongso_chuyencan' => trim($sheetData[$row]['O']),
							'trongso_giuaki' => trim($sheetData[$row]['P']),
							'trongso_cuoiki' => trim($sheetData[$row]['Q']),
						);
						if($this->Ketquahoctap_tam_model->create($data))
						{
							$error['load'] = true;
		  				}
					}
					else
					{
						break;
					}
				}
			}
			else{
				$error['kiemtrafile'] = 'Vui lòng chọn đúng định dạng file';
			}
			}
			else {
				$error['khongchonfile'] = 'Vui Lòng Chọn File';
			}
			echo json_encode($error);
		}

		function review_kqht()
		{
      		$listnganhhoc = $this->Nganhhoc_model->get_list();
      		$data['listreview']=$this->Ketquahoctap_tam_model->reviewkqht();
      		foreach ($data['listreview'] as $key => $value) {
						// pre($value['lophoc_id']. '  '.$value['monhoc_id']);
      			$checklop = $this->Lophoc_model->Checklopkqht_byid($value['lophoc_id'], $value['monhoc_id']);
      			if ($checklop != true ) {
          		$data['listreview'][$key]['lopmoi'] = true;
        		}
        		else {
         			$data['listreview'][$key]['lopmoi'] = false;
        		}
        		$checknganh = $this->Nganhhoc_model->checkNH($value['nganhhoc_id']);
        		if($checknganh != true)
        		{
        			$data['listreview'][$key]['nganhmoi'] = true;
        		}
        		else {
         			$data['listreview'][$key]['nganhmoi'] = false;
        		}
        		$checkmon = $this->Monhoc_model->Check_Mon($value['monhoc_id']);
        		if($checkmon != true)
        		{
        			$data['listreview'][$key]['monmoi'] = true;
        		}
        		else {
         			$data['listreview'][$key]['monmoi'] = false;
        		}
        		$checksv = $this->Sinhvien_model->check_SV($value['sinhvien_id']);
        		if($checksv != true)
        		{
        			$data['listreview'][$key]['svmoi'] = true;
        		}
        		else {
         			$data['listreview'][$key]['svmoi'] = false;
        		}
      		}
					
      		$data['listnganhhoc'] = $listnganhhoc;
					$this->load->view('Giaovu/Ketquahoctap/Ketquahoctap_review',$data);
		}

		function run_sp()
		{
          $data['listreview']=$this->Ketquahoctap_tam_model->reviewkqht();
          foreach ($data['listreview'] as $key => $value) {
        		$checknganh = $this->Nganhhoc_model->checkNH($value['nganhhoc_id']);
        		if($checknganh != true)
        		{
        			$data['listreview'][$key]['nganhmoi'] = true;
        		}
        		else {
         			$data['listreview'][$key]['nganhmoi'] = false;
        		}
        		$checkmon = $this->Monhoc_model->Check_Mon($value['monhoc_id']);
        		if($checkmon != true)
        		{
        			$data['listreview'][$key]['monmoi'] = true;
        		}
        		else {
         			$data['listreview'][$key]['monmoi'] = false;
        		}
        		$checksv = $this->Sinhvien_model->check_SV($value['sinhvien_id']);
        		if($checksv != true)
        		{
        			$data['listreview'][$key]['svmoi'] = true;
        		}
        		else {
         			$data['listreview'][$key]['svmoi'] = false;
        		}
        	}
          $check1 = true;
          $error = array(
          	'check' => false,
          	'dulieurong' => false,
          );
          foreach ($data['listreview'] as $key => $value) {
            if ($value['monhoc_id'] == 'null' || $value['nganhhoc_id'] == 'null' || $value['lophoc_id'] == 'null' || $value['sinhvien_id'] == 'null' || $value['nganhmoi'] == 1 || $value['monmoi'] == 1 || $value['svmoi'] == 1) {
              $check1 = false;
              break;
            }
          }
          
          if ($check1 == true) {
            $this->Ketquahoctap_model->run_sp();
            $list['listreview']=$this->Ketquahoctap_tam_model->reviewkqht();
            if ($list['listreview'] == false)
            {
              $error['check'] = true;
            }
            else
            {
              $error['check'] = false;
            }
          }
          else {
            $error['dulieurong'] = true;
          }
         echo json_encode($error);
        }
        function cancel_sp()
        {
          $this->Ketquahoctap_model->cancel_sp();
          redirect(base_url().'Giaovu/Ketquahoctap/index');
        }
				function diemhoctapsv()
				{
					$idsv = $this->input->get('idsv');
					$idn = $this->input->get('nganh');
					$idk = $this->input->get('khoa');
					$data['listDiemChitiet'] = $this->Ketquahoctap_model->get_Diem_SV($idsv,$idn,$idk);
					$data['listDRL'] = $this->Diemrenluyen_model->Getdrl_Chitiet($idn, $idk, $idsv);
					$tu_dtb_hk1=null;
			$mau_dtb_hk1=0;
			$tu_dtb_hk2=null;
			$mau_dtb_hk2=0;
			$tu_dtb_hk3=null;
			$mau_dtb_hk3=0;
			$tu_dtb_hk4=null;
			$mau_dtb_hk4=0;
			$tu_dtb_hk5=null;
			$mau_dtb_hk5=0;
			$tu_dtb_hk6=null;
			$mau_dtb_hk6=0;
			$tu_dtb_hk7=null;
			$mau_dtb_hk7=0;
			$tu_dtb_hk8=null;
			$mau_dtb_hk8=0;
			//pre($data['listDiemChitiet']);
			//------------
			$check = false;

			//------------
			for ($i=0; $i < count($data['listDiemChitiet']) ; $i++) {
				if(isset($data['listDiemChitiet'][$i]['dvht_tc'])){
					$check = TRUE;
				}
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 1){
					$tu_dtb_hk1 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk1 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai1'] = round($tu_dtb_hk1/$mau_dtb_hk1, 2);
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 2){
					$tu_dtb_hk2 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk2 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai2'] = round($tu_dtb_hk2/$mau_dtb_hk2, 2);
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 3){
					$tu_dtb_hk3 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk3 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai3'] = round($tu_dtb_hk3/$mau_dtb_hk3, 2);
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 4){
					$tu_dtb_hk4 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk4 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai4'] = round($tu_dtb_hk4/$mau_dtb_hk4, 2);
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 5){
					$tu_dtb_hk5 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk5 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai5'] = round($tu_dtb_hk5/$mau_dtb_hk5, 2);
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 6){
					$tu_dtb_hk6 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk6 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai6'] = round($tu_dtb_hk6/$mau_dtb_hk6, 2);
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 7){
					$tu_dtb_hk7 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk7 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai7'] = round($tu_dtb_hk7/$mau_dtb_hk7, 2);
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 8){
					$tu_dtb_hk8 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk8 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai8'] = round($tu_dtb_hk8/$mau_dtb_hk8, 2);
				}
			}
			//pre($mau_dtb_hk1);
			// for ($i=0; $i < count($data['listDiemChitiet']) ; $i++) {
			// 	if(isset($data['listDiemChitiet'][$i]['dvht_tc'])){
			// 		$check = TRUE;
			// 	}
			// 	if($check == TRUE){$data['dtb_hientai1'] = round($tu_dtb_hk1/$mau_dtb_hk1, 2);}
			// 	if($check == TRUE){$data['dtb_hientai2'] = round($tu_dtb_hk2/$mau_dtb_hk2, 2);}
			// 	if($check == TRUE){$data['dtb_hientai3'] = round($tu_dtb_hk3/$mau_dtb_hk3, 2);}
			// 	if($check == TRUE){$data['dtb_hientai4'] = round($tu_dtb_hk4/$mau_dtb_hk4, 2);}
			// 	if($check == TRUE){$data['dtb_hientai5'] = round($tu_dtb_hk5/$mau_dtb_hk5, 2);}
			// 	if($check == TRUE){$data['dtb_hientai6'] = round($tu_dtb_hk6/$mau_dtb_hk6, 2);}
			// 	if($check == TRUE){$data['dtb_hientai7'] = round($tu_dtb_hk7/$mau_dtb_hk7, 2);}
			// 	if($check == TRUE){$data['dtb_hientai8'] = round($tu_dtb_hk8/$mau_dtb_hk8, 2);}
			// }
					// $data['dtb_hientai1'] = 0;
					// $data['dtb_hientai2'] = 0;
					// $data['dtb_hientai3'] = 0;
					// $data['dtb_hientai4'] = 0;
					// $data['dtb_hientai5'] = 0;
					// $data['dtb_hientai6'] = 0;
					// $data['dtb_hientai7'] = 0;
					// $data['dtb_hientai8'] = 0;



			//------------------------------------------------------------------
			//---------------Diem Trung Binh Tich Luy---------------------------
			$tu_tongtb_hk1=null;
			$mau_tongtb_hk1=0;
			$tu_tongtb_hk2=null;
			$mau_tongtb_hk2=0;
			$tu_tongtb_hk3=null;
			$mau_tongtb_hk3=0;
			$tu_tongtb_hk4=null;
			$mau_tongtb_hk4=0;
			$tu_tongtb_hk5=null;
			$mau_tongtb_hk5=0;
			$tu_tongtb_hk6=null;
			$mau_tongtb_hk6=0;
			$tu_tongtb_hk7=null;
			$mau_tongtb_hk7=0;
			$tu_tongtb_hk8=null;
			$mau_tongtb_hk8=0;

			for ($i=0; $i < count($data['listDiemChitiet']) ; $i++) {
				if(isset($data['listDiemChitiet'][$i]['dvht_tc'])){
					$check = TRUE;
				}
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 1) {
					$tu_tongtb_hk1 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_tongtb_hk1 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_tong_hk1'] = round($tu_tongtb_hk1/$mau_tongtb_hk1, 2);
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 2) {
					$tu_tongtb_hk2 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1;
					$mau_tongtb_hk2 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1;
					$data['dtb_tong_hk2'] = round($tu_tongtb_hk2/$mau_tongtb_hk2, 2);
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 3) {
					$tu_tongtb_hk3 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2;
					$mau_tongtb_hk3 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2;
					$data['dtb_tong_hk3'] = round($tu_tongtb_hk3/$mau_tongtb_hk3, 2);
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 4) {
					$tu_tongtb_hk4 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3;
					$mau_tongtb_hk4 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3;
					$data['dtb_tong_hk4'] = round($tu_tongtb_hk4/$mau_tongtb_hk4, 2);
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 5) {
					$tu_tongtb_hk5 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3 + $tu_tongtb_hk4;
					$mau_tongtb_hk5 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3 + $mau_tongtb_hk4;
					$data['dtb_tong_hk5'] = round($tu_tongtb_hk5/$mau_tongtb_hk5, 2);
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 6) {
					$tu_tongtb_hk6 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3 + $tu_tongtb_hk4 + $tu_tongtb_hk5;
					$mau_tongtb_hk6 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3 + $mau_tongtb_hk4 + $mau_tongtb_hk5;
					$data['dtb_tong_hk6'] = round($tu_tongtb_hk6/$mau_tongtb_hk6, 2);
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 7) {
					$tu_tongtb_hk7 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3 + $tu_tongtb_hk4 + $tu_tongtb_hk5 +$tu_tongtb_hk6;
					$mau_tongtb_hk7 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3 + $mau_tongtb_hk4 + $mau_tongtb_hk5 + $mau_tongtb_hk6;
					$data['dtb_tong_hk7'] = round($tu_tongtb_hk7/$mau_tongtb_hk7, 2);
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 8) {
					$tu_tongtb_hk7 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3 + $tu_tongtb_hk4 + $tu_tongtb_hk5 + $tu_tongtb_hk6 + $tu_tongtb_hk7;
					$mau_tongtb_hk7 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3 + $mau_tongtb_hk4 + $mau_tongtb_hk5 + $mau_tongtb_hk6 + $mau_tongtb_hk7;
					$data['dtb_tong_hk8'] = round($tu_tongtb_hk8/$mau_tongtb_hk8, 2);
				}

			}

			// $data['dtb_tong_hk1'] = round($tu_tongtb_hk1/$mau_tongtb_hk1, 2);
			// $data['dtb_tong_hk2'] = round($tu_tongtb_hk2/$mau_tongtb_hk2, 2);
			// $data['dtb_tong_hk3'] = round($tu_tongtb_hk3/$mau_tongtb_hk3, 2);
			// $data['dtb_tong_hk4'] = round($tu_tongtb_hk4/$mau_tongtb_hk4, 2);
			// $data['dtb_tong_hk5'] = round($tu_tongtb_hk5/$mau_tongtb_hk5, 2);
			// $data['dtb_tong_hk6'] = round($tu_tongtb_hk6/$mau_tongtb_hk6, 2);
			// $data['dtb_tong_hk7'] = round($tu_tongtb_hk7/$mau_tongtb_hk7, 2);
			// $data['dtb_tong_hk8'] = round($tu_tongtb_hk8/$mau_tongtb_hk8, 2);

					$data['temp'] = 'Giaovu/Ketquahoctap/Ketquahoctapsv';
					$this->load->view('Giaovu/index', $data);
				}
	}
?>
