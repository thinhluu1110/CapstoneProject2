<?php
Class Tamngung extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Sinhvien_model');
		}
		function index()
		{
      $time = $this->input->get('TimeTN');
      $status = 1;
      $SV_info_filter = [];
      $data['svStatus'] = $this->Sinhvien_model->get_infobyStatus($status);
      if ($time == '12') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c > 365) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '12to9') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 365 && $c>273) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '9to6') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 273 && $c>183) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '6to3') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 183 && $c>93) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '3to1') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 93 && $c>30) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;
      }
      else if ($time == '1') {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          if ($c <= 30) {
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
        }
      }
      $data['svStatus'] = $SV_info_filter;

      }
      else {
        foreach ($data['svStatus'] as  $value) {
          $a = strtotime(date('Y-m-d'));
          $b = strtotime($value['ngay_ketthuc']);
          $c = ($b-$a)/60/60/24;
          $SV_info_filter[] = [
            'MSSV' => $value['MSSV'],
            'MaHS' => $value['MaHS'],
            'Ho' => $value['Ho'],
            'Ten' => $value['Ten'],
            'Nganh' => $value['tennganh'],
            'Khoa' => $value['tenkhoa'],
            'Ngaybd' => $value['ngay_batdau'],
            'Ngaykt' => $value['ngay_ketthuc'],
            'Lido' => $value['LiDo'],
            'Alert' => $c,
          ];
      }
      $data['svStatus'] = $SV_info_filter;

      }

			$data['temp'] = 'Giaovu/Tamngung/Tamngung';
			$this->load->view('Giaovu/index',$data);
		}
	}

 ?>
