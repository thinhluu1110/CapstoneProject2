<?php
Class Hocbong extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
			//$this->load->model('semester_model');
      $this->load->model('Dieukiendoan_model');
      $this->load->model('Nganhhoc_model');
      $this->load->model('Sinhvien_model');
		}
		function index()
		{
      $listnganhhoc = $this->Nganhhoc_model->get_list();
      if (isset($this->input->get('submit'))){
      $idn = $this->input->get('nganhhoc');
      $idk = $this->input->get('khoahoc');
      $idhk = $this->input->get('hocki');
      $tbht = $this->input->get('tbht');
      $tbrl = $this->input->get('tbrl');
      $thilai = $this->input->get('thilai');
      $data_user_pass = [];
      if($idn)
			{
      $data['listkhoahoc'] = $this->Dieukiendoan_model->getkhoadkda($idn);
			}
      if($idn && $idk && $idhk)
      {
        // pre($idn .' '.$idk.' '.$idhk.' '.$tbht.' '.$tbrl.' '.$thilai);
        $data['listDSHB']=$this->Sinhvien_model->getsvby_nganhkhoahocki($idn,$idk,$idhk);
        // pre($data['listDSHB']);


        for ($i=0; $i < count($data['listDSHB']) ; $i++) {
          $array_result[$data['listDSHB'][$i]['MSSV']][] = $data['listDSHB'][$i];
        }
        // pre($array_result);
        if (isset($array_result)) {
          foreach ($array_result as $MSSV => $value) {
            $tu = 0;
            $mau = 1;
            $tbhk = 0;
            for ($k=0; $k <count($value) ; $k++) {
              $tu += ($value[$k]['diemTB']*$value[$k]['dvht_tc']);
              $mau += $value[$k]['dvht_tc'];
              $drl = $value[$k]['diem'];
            }
            $tbhk += round(($tu/$mau),2);
            for ($j=0; $j <count($value) ; $j++) {
              if ($thilai == "yes") {
                if ($value[$j]['lan2'] != null) {
                  continue;
                }
                if ($tbhk < $tbht || $drl <$tbrl) {
                  continue;
                }
                $data_user_pass[$MSSV] = [
                  'MSSV' => $value[$j]['MSSV'],
                  'Ho' => $value[$j]['Ho'],
                  'Ten' => $value[$j]['Ten'],
                  'Nganh' => $value[$j]['tennganh'],
                  'Khoa' => $value[$j]['tenkhoa'],
                  'TBHT' => $tbhk,
                  'TBRL' => $drl,
                ];
              }
              else {
                if ($tbhk < $tbht || $drl <$tbrl) {
                  continue;
                }
                $data_user_pass[$MSSV] = [
                  'MSSV' => $value[$j]['MSSV'],
                  'Ho' => $value[$j]['Ho'],
                  'Ten' => $value[$j]['Ten'],
                  'Nganh' => $value[$j]['tennganh'],
                  'Khoa' => $value[$j]['tenkhoa'],
                  'TBHT' => $tbhk,
                  'TBRL' => $drl,
                ];
              }
            }

          }
        }
      }
      $data['listsvpasshb'] = $data_user_pass;
      $data['listnganhhoc'] = $listnganhhoc;
			$data['temp'] = 'Giaovu/Hocbong/Hocbong';
			$this->load->view('Giaovu/index',$data);
		}
  }
	}

 ?>
