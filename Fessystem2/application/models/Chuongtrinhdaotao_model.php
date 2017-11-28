<?php
Class Chuongtrinhdaotao_model extends MY_Model
{
	function __construct()
    {
      parent::__construct();
    }
    var $table = 'chuongtrinhdaotao';
    var $key = 'ctdt_id';
    function getAll($idn)
    {
			$this->db->select('*')
					 ->from('chuongtrinhdaotao as c')
					 ->join('nganhhoc as n','c.nganhhoc_id = n.nganhhoc_id' )
					 ->join('khoahoc as k', 'c.khoahoc_id = k.khoahoc_id')
					 ->where('c.nganhhoc_id',$idn);
			$query = $this->db->get();
			return $query->result_array();
    }
    function getFile($id)
    {
      $this->db->select('*')
           ->from('chuongtrinhdaotao')
           ->where('ctdt_id',$id);
      $query = $this->db->get();
      return $query->row_array();
    }
    function getfileWord($idk,$idn)
    {
      $this->db->select('*')
           ->from('chuongtrinhdaotao')
           ->where('khoahoc_id',$idk)
           ->where('nganhhoc_id',$idn);
      $query = $this->db->get();
      return $query->row_array();
    }
		function getFilebyNK($idn,$idk)
		{
			$this->db->select('*')
					 ->from('chuongtrinhdaotao as c')
					 ->join('nganhhoc as n','c.nganhhoc_id = n.nganhhoc_id' )
					 ->join('khoahoc as k', 'c.khoahoc_id = k.khoahoc_id')
					 ->where('c.khoahoc_id',$idk)
					 ->where('c.nganhhoc_id',$idn);
			$query = $this->db->get();
			return $query->result_array();
		}
		
		function Get_on_info($mssv)
	 {
		 $this->db->select('*')
			->from('chuongtrinhdaotao as c')
			->join('nganhhoc as n', 'c.nganhhoc_id = n.nganhhoc_id')
			->join('khoahoc as k', 'c.khoahoc_id = k.khoahoc_id')
			->join('sinhvien as s', 'c.nganhhoc_id = s.nganhhoc_id and c.khoahoc_id = s.khoahoc_id')
			->where('s.MSSV', $mssv);
		 $query = $this->db->get();
		 return $query->result_array();
	 }
	 function checkCTDT($idn,$idk){
		 $this->db->select('*')
			->from('chuongtrinhdaotao as c')
			->where('c.khoahoc_id', $idk)
			->where('c.nganhhoc_id', $idn);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return false;
			}else {
				return true;
			}

	 }
	 function Get_ctdtID($id)
    {
      $this->db->select('*')
      ->from('chuongtrinhdaotao as c')
      ->join('nganhhoc as n','c.nganhhoc_id = n.nganhhoc_id')
      ->join('khoahoc as k','c.khoahoc_id = k.khoahoc_id')
      ->where('ctdt_id',$id);
      $query = $this->db->get();
      return $query->row_array();
    }
}
?>
