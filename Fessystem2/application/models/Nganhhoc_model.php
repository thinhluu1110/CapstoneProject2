<?php
Class Nganhhoc_model extends MY_Model
{
	function __construct()
    {
      parent::__construct();
    }
    var $table = 'nganhhoc';
    var $key = 'nganhhoc_id';
     function Get_nganh()
    {
      $query = $this->db->get('nganhhoc');
      return $query->result_array();
    }
		function checkNH($manganh)
	 {
		 $this->db->select('*')
			->from('nganhhoc as n')
			->where('n.ma_nganhhoc', $manganh);
			$query = $this->db->get();
		 if ($query->num_rows() > 0) {
			 return true;
		 }
	 }
    function Get_nganhbyid($id)
    {
      $this->db->where('nganhhoc_id',$id);
      $query = $this->db->get('nganhhoc');
      return $query->row_array();
    }
		function checkNganh($idn)
		{
			$this->db->select('*')
			->from('nganhhoc as n');
      $this->db->where('n.ma_nganhhoc', $idn);
			$query = $this->db->get();
			return $query->row_array();
		}
    function Get_nganhbyidn($idn)
    {
      $this->db->select('*')
        ->from('nganhhoc as n')
        ->join('khoahoc as k', 'n.nganhhoc_id = k.nganhhoc_id');
      $this->db->where('n.nganhhoc_id',$idn);
      $query = $this->db->get();
      return $query->result_array();
    }
}
