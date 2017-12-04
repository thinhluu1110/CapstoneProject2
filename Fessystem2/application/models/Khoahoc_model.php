<?php
Class Khoahoc_model extends MY_Model
{
	function __construct()
    {
      parent::__construct();
    }
    var $table = 'khoahoc';
    var $key = 'khoahoc_id';
    function Get_khoa()
    {
      $query = $this->db->get('khoahoc');
      return $query->result_array();
    }
    function Get_khoabyid($id)
    {
			$this->db->select('*')
				->from('khoahoc as k')
				->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id');
      $this->db->where('khoahoc_id',$id);
      $query = $this->db->get();
      return $query->row_array();
    }
		function filter_Khoa($id)
    {
      // $this->db->select('*')
			// ->from('khoahoc as k')
			// ->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id');
			$this->db->where('nganhhoc_id',$id);
      $query = $this->db->get('khoahoc');
			return $query->result_array();
    }
		function Get_khoabyidn($idn)
    {
			$this->db->select('*')
				->from('khoahoc as k')
				->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id');
      $this->db->where('n.nganhhoc_id',$idn);
      $query = $this->db->get();
      return $query->result_array();
    }
    function Check_Khoa($tenkhoa,$manganh)
    {
      $this->db->select('*')
      ->from('khoahoc as k')
      //->join('nganhhoc as n','k.nganhhoc_id = n.nganhhoc_id')
      ->where('k.nganhhoc_id', $manganh)
      ->where('k.tenkhoa', $tenkhoa);
      
      $query = $this->db->get();
      if ($query->num_rows() > 0) 
      {
       return true;
      }
    }
     function Check_Khoabyid($tenkhoa,$manganh)
    {
      $this->db->select('*')
      ->from('khoahoc as k')
      ->join('nganhhoc as n','k.nganhhoc_id = n.nganhhoc_id')
      ->where('k.nganhhoc_id', $manganh)
      ->where('k.tenkhoa', $tenkhoa);
      
      $query = $this->db->get();
      if ($query->num_rows() > 0) 
      {
       return true;
      }
    }
    function Get_khoaID($id)
    {
      $this->db->select('*')
      ->from('khoahoc as k')
      ->join('nganhhoc as n','k.nganhhoc_id = n.nganhhoc_id')
      ->where('khoahoc_id',$id);
      $query = $this->db->get();
      return $query->row_array();
    }
    function Del_Nganhcheckkhoa($idn)
    {
      $this->db->select('*')
      ->from('khoahoc as k')
      ->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
      ->where('k.nganhhoc_id',$idn);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return true;
      }
      else{
        return false;
      }
    }
}
