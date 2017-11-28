<?php
Class Sinhvien_model extends MY_Model
{
	function __construct()
  {
    parent::__construct();
  }
  var $table = 'sinhvien';
  var $key = 'MSSV';
  function Get_on_info($mssv)
  {
    $this->db->select('*')
    ->from('drl as d')
    ->join('hocki as h', 'd.hocki_id = h.hocki_id')
    ->where('MSSV', $mssv);
    $query = $this->db->get();
    return $query->result_array();
  }
  function Getsv_byID($idmssv)
  {
    $this->db->select('*')
    ->from('sinhvien')
    ->where('MSSV', $idmssv);
    $query = $this->db->get();
    return $query->result_array();
  }
	function get_infobyMSSV($mssv)
  {
    $this->db->select('*')
    ->from('sinhvien as sv')
    ->join('nganhhoc as n', 'sv.nganhhoc_id = n.nganhhoc_id')
		->join('khoahoc as k', 'sv.khoahoc_id = k.khoahoc_id')
    ->where('sv.MSSV', $mssv);
    $query = $this->db->get();
    return $query->row_array();
  }
	function get_infobyStatus($status)
  {
    $this->db->select('*')
    ->from('sinhvien as sv')
    ->join('nganhhoc as n', 'sv.nganhhoc_id = n.nganhhoc_id')
		->join('khoahoc as k', 'sv.khoahoc_id = k.khoahoc_id')
    ->where('sv.Tinhtrang', $status);
    $query = $this->db->get();
    return $query->result_array();
  }
  function getsvbyNganh($idn)
  {
		$this->db->select('*')
			->from('sinhvien as sv')
			->where('nganhhoc_id',$idn)
      ->where('Tinhtrang = 0');
			$query = $this->db->get();
	    return $query->result_array();
  }
	function getsvbyNK($idn,$idk)
  {
		$this->db->select('*')
			->from('sinhvien as sv')
			->where('nganhhoc_id',$idn)
			->where('khoahoc_id',$idk)
      ->where('Tinhtrang = 0');
			$query = $this->db->get();
	    return $query->result_array();
  }
	function getsvby_nganhkhoa($idn,$idk)
  {
		$this->db->select('*')
			->from('sinhvien as sv')
			->join('ketquahoctap as kqht', 'sv.MSSV = kqht.sinhvien_id')
			->join('nganhhoc as n', 'sv.nganhhoc_id = n.nganhhoc_id')
			->join('khoahoc as k', 'sv.khoahoc_id = k.khoahoc_id')
			->where('sv.nganhhoc_id',$idn)
			->where('sv.khoahoc_id',$idk);
			$query = $this->db->get();
	    return $query->result_array();
  }
   function checkSV($id)
	 {
		 $this->db->select('*')
		 ->from('sinhvien as sv')
		 ->where('sv.MSSV',$id);
		 $query = $this->db->get();
		 if ($query->num_rows() > 0) {
		 	return false;
		 }
		 else {
		 	return true;
		 }
	 }
	 function delstatus($mssv,$data)
	 {
		 $this->db->replace('sinhvien', $data);
		 $this->db->where('MSSV', $mssv);
	 }
   function getsvby_nganhkhoahocki($idn,$idk,$idhk)
  {
    $this->db->select('*')
      ->from('sinhvien as sv')
      ->join('ketquahoctap as kqht', 'sv.MSSV = kqht.sinhvien_id')
      ->join('drl as d', 'sv.MSSV = d.MSSV')
      ->join('kehoachdaotao as khdt', 'kqht.monhoc_id = khdt.monhoc_id')
      ->join('nganhhoc as n', 'sv.nganhhoc_id = n.nganhhoc_id')
      ->join('khoahoc as k', 'sv.khoahoc_id = k.khoahoc_id')
      ->where('sv.nganhhoc_id',$idn)
      ->where('kqht.hocki_id',$idhk)
      ->where('d.hocky_id',$idhk)
      ->where('sv.khoahoc_id',$idk);
      $query = $this->db->get();
      return $query->result_array();
  }
}
?>
