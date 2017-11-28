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
		}
		function index()
		{
			$data = array();
			//get lophoc list
			$input = array();
			$data['listmon'] = $this->Monhoc_model->get_monhoc();
			$monhoc = $this->input->post('monhoc');
			$lophoc = $this->input->post('lophoc');
			if($monhoc)
			{
				$data['listlophoc'] = $this->Lophoc_model->get_lop_mon($monhoc);
			}
			if ($lophoc && $monhoc) {
				$data['listDiem'] = $this->Ketquahoctap_model->get_Diem_kqht($lophoc,$monhoc);
			}
			$data['temp'] = 'Giaovu/Ketquahoctap/Ketquahoctap';
			$this->load->view('Giaovu/index', $data);
		}

		function importKQHT()
		{
			$error  = array(
				'khongchonfile' => '',
				'load' => false
			);
			//$hocki=$this->input->post('hocki');
			$this->load->library('PHPExcel');
			if (!empty($_FILES['file']['tmp_name'])) {
				$file = $_FILES['file']['tmp_name'];
				$objReader = PHPExcel_IOFactory::createReaderForFile($file);
				$objExcel = $objReader->load($file);
				$worksheet = $objExcel->getSheet(0);
				$objReader->setLoadSheetsOnly($worksheet);
				$sheetData = $objExcel->getActiveSheet()->toArray(null,true,true,true);
				$highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
				$load = false;
				for ($row=2; $row <= $highestRow ; $row++)
				{
					$break = $sheetData[$row]['A'];
					if (!empty($break)) {
						$data = array(
							'sinhvien_id' => $sheetData[$row]['B'],
							'ho' => $sheetData[$row]['C'],
							'ten' => $sheetData[$row]['D'],
							'ngaysinh' => $sheetData[$row]['E'],
							'nganhhoc_id' => $sheetData[$row]['G'],
							'lophoc_id' => $sheetData[$row]['F'],
							'monhoc_id' => $sheetData[$row]['H'],
							'TenMH' => $sheetData[$row]['I'],
							'chuyencan' => $sheetData[$row]['J'],
							'giuaki' => $sheetData[$row]['K'],
							'lan1' => $sheetData[$row]['L'],
							'lan2' => $sheetData[$row]['M'],
							'diemTB' =>$sheetData[$row]['N'],
							'trongso_chuyencan' => $sheetData[$row]['O'],
							'trongso_giuaki' => $sheetData[$row]['P'],
							'trongso_cuoiki' => $sheetData[$row]['Q'],
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
			else {
				$error['khongchonfile'] = 'Vui Lòng Chọn File';
			}
			echo json_encode($error);
		}

		function review_kqht()
		{
      		$listnganhhoc = $this->Nganhhoc_model->get_list();
      		$data['listreview']=$this->Ketquahoctap_tam_model->reviewkqht();
      		$data['listnganhhoc'] = $listnganhhoc;
					$this->load->view('Giaovu/Ketquahoctap/Ketquahoctap_review',$data);
		}

		function run_sp()
		{
          $this->Ketquahoctap_model->run_sp();
					$error['check'] = false;
					$data['listreview']=$this->Ketquahoctap_tam_model->reviewkqht();
					if ($data['listreview'] == false) {
      			  $error['check'] = true;
      		}
      		else
      		{
      			  $error['check'] = false;
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
