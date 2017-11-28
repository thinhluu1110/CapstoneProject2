<?php
Class Ketquahoctap_tam_model extends MY_Model
{
    function __construct()
		{
			parent::__construct();
		}
    var $table = 'ketquahoctap_tam';
    var $key = 'kqht_id';
    function reviewkqht(){
      $this->db->select('*')
       ->from('ketquahoctap_tam as k');
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
        return $query->result_array();
      }
      else {
        return false;
      }
    }
}

?>
