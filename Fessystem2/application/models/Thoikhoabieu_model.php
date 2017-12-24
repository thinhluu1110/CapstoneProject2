<?php
Class Thoikhoabieu_model extends MY_Model
{
	function __construct()
    {
      parent::__construct();
    }
    var $table = 'thoikhoabieu';
    var $key = 'thoikhoabieu_id';
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
			->join('thoikhoabieu as tkb', 'hk.hocki_id = tkb.hocki_id');
			$this->db->where('tkb.nganhhoc_id',$idn)->where('tkb.khoahoc_id',$idk);
			$this->db->order_by('hk.hocki_id','desc');
      	$query = $this->db->get();
      	return $query->result();
    }
    function filltertkb($idn,$idk,$idhk)
	{
		$this->db->select('*')
	    	->from('thoikhoabieu as tkb')->order_by('tkb.thoikhoabieu_id','desc');
	       	$this->db->where('tkb.nganhhoc_id', $idn);
	       	$this->db->where('tkb.khoahoc_id', $idk);
	       	$this->db->where('tkb.hocki_id', $idhk);
    	$query = $this->db->get();
    	return $query->result();
	}
	function gettkbsv_byNKHK($idn,$idk,$idhk)
	{
		$this->db->select('*')
				->from('thoikhoabieu as tkb')->order_by('tkb.thoikhoabieu_id','desc');
					$this->db->where('tkb.nganhhoc_id', $idn);
					$this->db->where('tkb.khoahoc_id', $idk);
					$this->db->where('tkb.hocki_id', $idhk);
			$query = $this->db->get();
			return $query->row_array();
	}
	function Check_id_exit($idn,$idk,$idhk)
    {
		$this->db->select('*')
			->from('thoikhoabieu as tkb');
			$this->db->where('tkb.nganhhoc_id',$idn)->where('tkb.khoahoc_id',$idk)->where('tkb.hocki_id',$idhk);
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
