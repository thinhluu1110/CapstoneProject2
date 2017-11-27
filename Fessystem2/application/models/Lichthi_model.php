<?php
Class Lichthi_model extends MY_Model
{
	function __construct()
  	{
    	parent::__construct();
  	}
    var $table = 'lichthi';
    var $key = 'lichthi_id';
    function Get_khoabyid($id)
  	{
	$this->db->select('*')
		->from('khoahoc as k')
		->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id');
		$this->db->where('k.nganhhoc_id',$id);
		$this->db->order_by('k.khoahoc_id','desc');
    	$query = $this->db->get();
    	return $query->result();
  	}
    function Get_hockibyid($idn,$idk)
  	{
	  	$this->db->select('*')
			->from('hocki as hk')
			->join('lichthi as lt', 'hk.hocki_id = lt.hocki_id');
			$this->db->where('lt.nganhhoc_id',$idn)->where('lt.khoahoc_id',$idk);
			$this->db->order_by('hk.hocki_id','desc');
	    	$query = $this->db->get();
	    	return $query->result();
  	}
  	function Get_lanthibyhocki($idn,$idk,$idhk)
  	{
	  	$this->db->select('*')
			->from('lichthi as lt');
			$this->db->where('lt.nganhhoc_id',$idn)->where('lt.khoahoc_id',$idk)->where('lt.hocki_id',$idhk);
			//$this->db->order_by('lt.lanthi','desc');
	    	$query = $this->db->get();
	    	return $query->result();
  	}
  	function fillterLichThi($idn,$idk,$idhk,$idlt)
	{
		$this->db->select('*')
	    	->from('lichthi as lt')->order_by('lt.lichthi_id','desc');
	       	if($idn != ""){
	       	$this->db->where('lt.nganhhoc_id', $idn);
	       	}
	       	if($idk != ""){
	       	$this->db->where('lt.khoahoc_id', $idk);
	       	}
	       	if($idhk != ""){
	       	$this->db->where('lt.hocki_id', $idhk);
	       	}
	       	if($idlt != ""){
	       	$this->db->where('lt.lanthi', $idlt);
	       	}
    	$query = $this->db->get();
    	return $query->result();
	}
  	function Check_id_exit($idn,$idk,$idhk,$idlt)
  	{
		$this->db->select('*')
			->from('lichthi as lt');
			$this->db->where('lt.nganhhoc_id',$idn)->where('lt.khoahoc_id',$idk)->where('lt.hocki_id',$idhk)->where('lt.lanthi',$idlt);
		    	$query = $this->db->get();
		    	
		  	  	if ($query->num_rows() > 0) {
		      		return $query->row_array();
		  		}
		  		else {
		      		return false;
		  		}
  	}
  	function add_post($data)
  	{
 		$insert_id = $this->db->insert_id();
 		return  $insert_id;
  	}
}
