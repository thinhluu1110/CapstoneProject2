<?php
Class Hocki_model extends MY_Model
{
  function __construct()
		{
			parent::__construct();
		}
    var $table = 'hocki';
    var $key = 'hocki_id';
    function Get_hk()
    {
      $query = $this->db->get('hocki');
      return $query->result_array();
    }
}
