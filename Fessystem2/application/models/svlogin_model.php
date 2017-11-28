<?php
Class Svlogin_model extends MY_Model
{
	function __construct()
    {
      parent::__construct();
    }
    function Check_login($u,$p)
    {
      $this->db->where("username",$u);
      $this->db->where("password",$p);
      $query = $this->db->get('sinhvien');
      if ($query->num_rows() > 0) {
        return $query->row_array();
      }
      else
      {
        return false;
      }
    }
   
}
