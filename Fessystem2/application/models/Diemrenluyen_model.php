<?php
Class Diemrenluyen_model extends MY_Model
{
	function __construct()
		{
			parent::__construct();
		}
    var $table = 'drl';
    var $key = 'se_id';
    function filterdrl($idk,$idhk)
    {
    	$this->db->select('*')
    	->from('drl as d')
       	->join('sinhvien as s', 'd.MSSV = s.MSSV')
       	->join('khoahoc as kh', 'd.khoahoc_id = kh.khoahoc_id')
       	->join('hocki as h', 'd.hocky_id = h.hocki_id')
				->join('nganhhoc as n', 'd.nganhhoc_id = n.nganhhoc_id');
       	if($idn != ""){
       	$this->db->where('d.nganhhoc_id', $idn);
       	}
       	if($idk != ""){
       	$this->db->where('d.khoahoc_id', $idk);
       	}
				if($idh != ""){
				$this->db->where('d.hocky_id', $idh);
				}
    	$query = $this->db->get();
    	return $query->result_array();
    }
		function filterdrlbyN($idn)
    {
    	$this->db->select('*')
    	->from('drl as d')
			->join('sinhvien as s', 'd.MSSV = s.MSSV')
			->join('khoahoc as kh', 'd.khoahoc_id = kh.khoahoc_id')
			->join('hocki as h', 'd.hocky_id = h.hocki_id')
			->join('nganhhoc as n', 'd.nganhhoc_id = n.nganhhoc_id')
      ->where('d.nganhhoc_id', $idn);
    	$query = $this->db->get();
    	return $query->result_array();
    }
		function filterdrlbyNK($idn,$idk)
    {
    	$this->db->select('*')
				->from('drl as d')
				->join('sinhvien as s', 'd.MSSV = s.MSSV')
				->join('khoahoc as kh', 'd.khoahoc_id = kh.khoahoc_id')
				->join('hocki as h', 'd.hocky_id = h.hocki_id')
				->join('nganhhoc as n', 'd.nganhhoc_id = n.nganhhoc_id')
       	->where('d.nganhhoc_id', $idn)
				->where('d.khoahoc_id', $idk);
    	$query = $this->db->get();
    	return $query->result_array();
    }
		function filterdrlbyNHK($idn,$idk,$idh)
    {
    	$this->db->select('*')
				->from('drl as d')
				->join('sinhvien as s', 'd.MSSV = s.MSSV')
				->join('khoahoc as kh', 'd.khoahoc_id = kh.khoahoc_id')
				->join('hocki as h', 'd.hocky_id = h.hocki_id')
				->join('nganhhoc as n', 'd.nganhhoc_id = n.nganhhoc_id')
       	->where('d.nganhhoc_id', $idn)
				->where('d.khoahoc_id', $idk)
				->where('d.hocky_id', $idh);
    	$query = $this->db->get();
    	return $query->result_array();
    }
		function Get_hkbyidnk($idn,$idk)
    {
			$this->db->select('d.hocky_id,h.tenHocki')
				->from('drl as d')
				->join('hocki as h', 'd.hocky_id = h.hocki_id')
        ->where('nganhhoc_id',$idn)
        ->where('khoahoc_id',$idk);
      $query = $this->db->get();
      return $query->result_array();
    }
		function checkDRL($id,$idhk)
    {
			$this->db->select('*')
				->from('drl as d')
        ->where('d.MSSV',$id)
        ->where('d.hocky_id',$idhk);
      $query = $this->db->get();
			if ($query->num_rows() > 0) {
				return false;
			}
      else {
      	return true;
      }
    }
		function Get_on_info($mssv)
    {
      $this->db->select('*')
      ->from('drl as d')
      ->join('hocki as h', 'd.hocky_id = h.hocki_id')
      ->where('MSSV', $mssv);
      $query = $this->db->get();
      return $query->result_array();
    }
}
