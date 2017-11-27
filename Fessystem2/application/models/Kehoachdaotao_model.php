<?php
Class Kehoachdaotao_model extends MY_Model
{
    function __construct()
		{
			parent::__construct();
		}
    var $table = 'kehoachdaotao';
    var $key = 'khdt_id';
    function filterKHDT($idk,$idn){
      $this->db->select('*')
       ->from('kehoachdaotao as k')
       ->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
       ->join('hocki as h', 'k.hocki_id = h.hocki_id')
       ->join('khoahoc as kh', 'k.khoahoc_id = kh.khoahoc_id')
       ->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
       ->where('k.khoahoc_id', $idk)
       ->where('k.nganhhoc_id', $idn);
       $query = $this->db->get();
       return $query->result_array();
    }
    function getmonby_nganhkhoa($idk,$idn){
      $this->db->select('m.monhoc_id,m.TenMH')
       ->from('kehoachdaotao as k')
       ->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
       ->where('k.khoahoc_id', $idk)
       ->where('k.nganhhoc_id', $idn);
       $query = $this->db->get();
       return $query->result_array();
    }
    function khdt_info($id){
      $this->db->select('*')
       ->from('kehoachdaotao as k')
       ->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
       ->join('hocki as h', 'k.hocki_id = h.hocki_id')
       ->join('khoahoc as kh', 'k.khoahoc_id = kh.khoahoc_id')
       ->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
       ->where('k.khdt_id', $id);
       $query = $this->db->get();
       return $query->row_array();
    }
    function checkKHDT($idn,$idk){
      $this->db->select('*')
       ->from('kehoachdaotao as k')
       ->where('k.khoahoc_id', $idk)
       ->where('k.nganhhoc_id', $idn);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
         return false;
       }else {
         return true;
       }

    }
    function check_mon_khdt($idm,$idk,$idn)
    {
      $this->db->select('*')
       ->from('kehoachdaotao as k')
       ->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
       ->where('k.monhoc_id', $idm)
       ->where('k.khoahoc_id', $idk)
       ->where('k.nganhhoc_id', $idn);
       $query = $this->db->get();
      return $query->row_array();
    }
    function run_sp(){
      $this->db->query("CALL ImportKhdt()");
    }
    function cancel_sp(){
      $this->db->empty_table('kehoachdaotao_tam');
    }
    function Del_Khoacheckkhdt($idk)
    {
      $this->db->select('*')
      ->from('kehoachdaotao as khdt')
      ->join('khoahoc as k', 'khdt.khoahoc_id = k.khoahoc_id')
      ->where('khdt.khoahoc_id',$idk);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return true;
      }
      else{
        return false;
      }
    }
    function filterKHDT_by_hk($idk, $idn, $idhk)
    {
      $this->db->select('*')
       ->from('kehoachdaotao as k')
       ->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
       ->join('hocki as h', 'k.hocki_id = h.hocki_id')
       ->join('khoahoc as kh', 'k.khoahoc_id = kh.khoahoc_id')
       ->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
       ->where('k.khoahoc_id', $idk)
       ->where('k.nganhhoc_id', $idn)
       ->where('k.hocki_id', $idhk);
       $query = $this->db->get();
       return $query->result_array();
    }
    function getmon_khdtID($id)
    {
      $this->db->select('*')
      ->from('kehoachdaotao as k')
      ->join('nganhhoc as n','k.nganhhoc_id = n.nganhhoc_id')
      ->join('khoahoc as kh','k.khoahoc_id = kh.khoahoc_id')
      ->join('monhoc as m','k.monhoc_id = m.monhoc_id')
      ->join('hocki as h','k.hocki_id = h.hocki_id')
      ->where('khdt_id',$id);
      $query = $this->db->get();
      return $query->row_array();
    }

}
?>
