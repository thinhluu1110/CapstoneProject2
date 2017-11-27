<?php
Class Hocphi_model extends MY_Model
{
  function __construct()
		{
			parent::__construct();
		}
    var $table = 'hocphi';
    var $key = 'hocphi_id';
    function Get_hk()
    {
      $query = $this->db->get('hocki');
      return $query->result_array();
    }
    function filterhpbyN($idn)
    {
      $this->db->select('*')
			->from('hocphi as hp')
			->join('sinhvien as sv', 'hp.MSSV = sv.MSSV');
      $this->db->where('sv.nganhhoc_id', $idn);
      $query = $this->db->get();
			return $query->result_array();
    }
    function filterhpbyNK($idn,$idk)
    {
      $this->db->select('*')
      ->from('hocphi as hp')
      ->join('sinhvien as sv', 'hp.MSSV = sv.MSSV');
      $this->db->where('sv.nganhhoc_id', $idn);
      $this->db->where('sv.khoahoc_id', $idk);
      $query = $this->db->get();
      return $query->result_array();
    }
    function delAll()
    {
      $this->db->empty_table('hocphi');
    }
    function Get_on_info($mssv)
	  {
	    $this->db->select('*')
	    ->from('hocphi as hp')
	    ->where('MSSV', $mssv);
	    $query = $this->db->get();
	    return $query->row_array();
	  }
}
