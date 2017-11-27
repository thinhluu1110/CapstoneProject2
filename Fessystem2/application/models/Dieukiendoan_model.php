<?php
	Class Dieukiendoan_model extends MY_Model
	{
    function __construct()
    {
      parent::__construct();
    }
    	var $table = 'dkdoan';
    	var $key = 'dkda_id';

		 function checkdkda($idn,$idk)
		{
			$this->db->select('*')
			->from('dkdoan as dk');
      $this->db->where('dk.nganhhoc_id', $idn);
      $this->db->where('dk.khoahoc_id', $idk);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
				return true;
			}
			else {
				return false;
			}
		}
    function getdkby_nganhkhoa($idn,$idk)
   {
     $this->db->select('*')
     ->from('dkdoan as dk')
     ->join('khoahoc as k','dk.khoahoc_id = k.khoahoc_id')
     ->join('nganhhoc as n','dk.nganhhoc_id = n.nganhhoc_id')
     ->where('dk.nganhhoc_id', $idn)
     ->where('dk.khoahoc_id', $idk);
     $query = $this->db->get();
     return $query->result_array();
   }
	 function getkhoadkda($idn)
	{
		$this->db->select('*')
		->from('dkdoan as dk')
		->join('khoahoc as k', 'dk.khoahoc_id = k.khoahoc_id');
		$this->db->where('dk.nganhhoc_id', $idn);
		$query = $this->db->get();
		return $query->result_array();
	}
		function getdkda_byid($iddkda)
		{
			$this->db->select('*')
			->from('dkdoan as dk')
			->join('khoahoc as k', 'dk.khoahoc_id = k.khoahoc_id')
			->join('nganhhoc as n', 'dk.nganhhoc_id = n.nganhhoc_id')
			->where('dk.dkda_id', $iddkda);
			$query = $this->db->get();
     		if ($query->num_rows() > 0) {
       			return true;
      		}
      		else{
        		return false;
      		}
		}
	}
?>
