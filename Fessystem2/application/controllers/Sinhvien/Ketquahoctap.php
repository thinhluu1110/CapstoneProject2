<?php
	Class Ketquahoctap extends MY_Controller
	{
		// private  $field_data = array(
		// 	'mssv' => null;
		// );
		function __construct()
		{
			parent::__construct();
			$this->load->model('Ketquahoctap_model');
			$this->load->model('Lophoc_model');
			$this->load->model('Monhoc_model');
			$this->load->model('Nganhhoc_model');
		}
		function index($idn, $idk,$idsv)
		{
			$input = array();
			$hocki_id = $this->input->get('hocki_id');
			$data['listDiemChitiet'] = $this->Ketquahoctap_model->get_Diem_Chitiet($idn, $idk, $idsv);
			//--------------Diem trung binh hoc ki------------------------
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
					$data['dtb_hientai1'] = $tu_dtb_hk1/$mau_dtb_hk1;
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 2){
					$tu_dtb_hk2 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk2 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai2'] =$tu_dtb_hk2/$mau_dtb_hk2;
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 3){
					$tu_dtb_hk3 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk3 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai3'] = $tu_dtb_hk3/$mau_dtb_hk3;
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 4){
					$tu_dtb_hk4 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk4 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai4'] = $tu_dtb_hk4/$mau_dtb_hk4;
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 5){
					$tu_dtb_hk5 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk5 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai5'] = $tu_dtb_hk5/$mau_dtb_hk5;
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 6){
					$tu_dtb_hk6 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk6 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai6'] = $tu_dtb_hk6/$mau_dtb_hk6;
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 7){
					$tu_dtb_hk7 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk7 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai7'] = $tu_dtb_hk7/$mau_dtb_hk7;
				}else
				if($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 8){
					$tu_dtb_hk8 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']);
					$mau_dtb_hk8 += $data['listDiemChitiet'][$i]['dvht_tc'];
					$data['dtb_hientai8'] = $tu_dtb_hk8/$mau_dtb_hk8;
				}
			}
			//pre($mau_dtb_hk1);
			// for ($i=0; $i < count($data['listDiemChitiet']) ; $i++) {
			// 	if(isset($data['listDiemChitiet'][$i]['dvht_tc'])){
			// 		$check = TRUE;
			// 	}
			// 	if($check == TRUE){$data['dtb_hientai1'] = $tu_dtb_hk1/$mau_dtb_hk1;}
			// 	if($check == TRUE){$data['dtb_hientai2'] = $tu_dtb_hk2/$mau_dtb_hk2;}
			// 	if($check == TRUE){$data['dtb_hientai3'] = $tu_dtb_hk3/$mau_dtb_hk3;}
			// 	if($check == TRUE){$data['dtb_hientai4'] = $tu_dtb_hk4/$mau_dtb_hk4;}
			// 	if($check == TRUE){$data['dtb_hientai5'] = $tu_dtb_hk5/$mau_dtb_hk5;}
			// 	if($check == TRUE){$data['dtb_hientai6'] = $tu_dtb_hk6/$mau_dtb_hk6;}
			// 	if($check == TRUE){$data['dtb_hientai7'] = $tu_dtb_hk7/$mau_dtb_hk7;}
			// 	if($check == TRUE){$data['dtb_hientai8'] = $tu_dtb_hk8/$mau_dtb_hk8;}
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
					$data['dtb_tong_hk1'] = $tu_tongtb_hk1/$mau_tongtb_hk1;
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 2) {
					$tu_tongtb_hk2 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1;
					$mau_tongtb_hk2 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1;
					$data['dtb_tong_hk2'] = $tu_tongtb_hk2/$mau_tongtb_hk2;
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 3) {
					$tu_tongtb_hk3 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2;
					$mau_tongtb_hk3 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2;
					$data['dtb_tong_hk3'] = $tu_tongtb_hk3/$mau_tongtb_hk3;
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 4) {
					$tu_tongtb_hk4 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3;
					$mau_tongtb_hk4 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3;
					$data['dtb_tong_hk4'] = $tu_tongtb_hk4/$mau_tongtb_hk4;
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 5) {
					$tu_tongtb_hk5 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3 + $tu_tongtb_hk4;
					$mau_tongtb_hk5 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3 + $mau_tongtb_hk4;
					$data['dtb_tong_hk5'] = $tu_tongtb_hk5/$mau_tongtb_hk5;
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 6) {
					$tu_tongtb_hk6 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3 + $tu_tongtb_hk4 + $tu_tongtb_hk5;
					$mau_tongtb_hk6 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3 + $mau_tongtb_hk4 + $mau_tongtb_hk5;
					$data['dtb_tong_hk6'] = $tu_tongtb_hk6/$mau_tongtb_hk6;
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 7) {
					$tu_tongtb_hk7 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3 + $tu_tongtb_hk4 + $tu_tongtb_hk5 +$tu_tongtb_hk6;
					$mau_tongtb_hk7 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3 + $mau_tongtb_hk4 + $mau_tongtb_hk5 + $mau_tongtb_hk6;
					$data['dtb_tong_hk7'] = $tu_tongtb_hk7/$mau_tongtb_hk7;
				}else
				if ($check == TRUE && $data['listDiemChitiet'][$i]['hocki_id'] == 8) {
					$tu_tongtb_hk7 += ($data['listDiemChitiet'][$i]['dvht_tc'] * $data['listDiemChitiet'][$i]['diemTB']) + $tu_tongtb_hk1 + $tu_tongtb_hk2 + $tu_tongtb_hk3 + $tu_tongtb_hk4 + $tu_tongtb_hk5 + $tu_tongtb_hk6 + $tu_tongtb_hk7;
					$mau_tongtb_hk7 += $data['listDiemChitiet'][$i]['dvht_tc'] + $mau_tongtb_hk1 + $mau_tongtb_hk2 + $mau_tongtb_hk3 + $mau_tongtb_hk4 + $mau_tongtb_hk5 + $mau_tongtb_hk6 + $mau_tongtb_hk7;
					$data['dtb_tong_hk8'] = $tu_tongtb_hk8/$mau_tongtb_hk8;
				}

			}

			// $data['dtb_tong_hk1'] = $tu_tongtb_hk1/$mau_tongtb_hk1;
			// $data['dtb_tong_hk2'] = $tu_tongtb_hk2/$mau_tongtb_hk2;
			// $data['dtb_tong_hk3'] = $tu_tongtb_hk3/$mau_tongtb_hk3;
			// $data['dtb_tong_hk4'] = $tu_tongtb_hk4/$mau_tongtb_hk4;
			// $data['dtb_tong_hk5'] = $tu_tongtb_hk5/$mau_tongtb_hk5;
			// $data['dtb_tong_hk6'] = $tu_tongtb_hk6/$mau_tongtb_hk6;
			// $data['dtb_tong_hk7'] = $tu_tongtb_hk7/$mau_tongtb_hk7;
			// $data['dtb_tong_hk8'] = $tu_tongtb_hk8/$mau_tongtb_hk8;

			//------------------------------------------------------------------
		 	$data['temp']  = 'Sinhvien/kqht/Chitietketquahoctap';
			$this->load->view('Sinhvien/index', $data);
		}
		function check_dvht($idn, $idk, $idsv)
		{
			$input = array();
			$data['listDiemChitiet'] = $this->Ketquahoctap_model->get_Diem_Chitiet($idn, $idk, $idsv);
			pre($data['listDiemChitiet']);
			$dvht = $this->input->get('dvht_tc');
			if (empty($data['listDiemChitiet']['dvht_tc'])) {
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}
?>
