<?php
Class Kehoachdaotao_model extends MY_Model
{
    function __construct()
		{
			parent::__construct();
		}
    var $table = 'kehoachdaotao';
    function filterKHDT($id){
      $this->db->select('*')
       ->from('kehoachdaotao as k')
       ->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
       ->join('hocki as h', 'k.hocki_id = h.hocki_id')
       ->join('khoahoc as kh', 'k.khoahoc_id = kh.khoahoc_id')
       ->join('monhoc as m', 'k.monhoc_id = m.MaMH')
       ->where('k.khoahoc_id', $id);
       $query = $this->db->get();
       return $query->result_array();
    }
}
