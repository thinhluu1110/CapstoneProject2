<?php
Class Kehoachdaotao_tam_model extends MY_Model
{
    function __construct()
		{
			parent::__construct();
		}
    var $table = 'kehoachdaotao_tam';
    var $key = 'khdt_id';
    function reviewkhdt(){
      $this->db->select('*')
       ->from('kehoachdaotao_tam as k')
       ->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
       ->join('khoahoc as kh', 'k.khoahoc_id = kh.khoahoc_id');
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
