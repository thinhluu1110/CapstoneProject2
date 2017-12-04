<?php
Class Monhoc_model extends MY_Model
{

    function __construct()
    {
      parent::__construct();
    }
    var $table = 'monhoc';
    var $key = 'monhoc_id';
    function get_monhoc()
    {
      $this->db->select('*')
      ->from('monhoc');
      $query = $this->db->get();
      return $query->result_array();
    }
    function Get_monhocbyid($id)
    {
      $this->db->where('monhoc_id',$id);
      $query = $this->db->get('monhoc');
      return $query->row_array();
    }
    function Del_mon($id)
    {
      $this->db->where('monhoc_id', $id);
      $this->db->delete('monhoc');
    }
   //  function filter_Mon($id)
   //  {
   //    $this->db->select('*')
			// ->from('monhoc as m')
			// ->join('lophoc as lh', 'm.lophoc_id = lh.tenlop');
   //    $this->db->where('lh.lophoc_id', $id);
   //    $query = $this->db->get();
			// return $query->result_array();
   //  }
    function checkmonHoc($id,$ten)
    {
      $this->db->select('*')
			->from('monhoc as m');
      $this->db->where('m.MaMH', $id);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->row_array();
      }else {
        $this->db->set('MaMH', $id);
        $this->db->set('TenMH', $ten);
        $this->db->insert('monhoc');
        $this->db->select('*')
  			->from('monhoc as m');
        $this->db->where('m.MaMH', $id);
        $query = $this->db->get();
  			return $query->row_array();
      }
    }
   //  function checkMon($idm)
   //  {
   //    $this->db->select('*')
			// ->from('monhoc as m');
   //    $this->db->where('m.MaMH', $idm);
   //    $query = $this->db->get();
			// return $query->row_array();
   //  }
    function Check_Mon($mamon)
    {
      $this->db->select('*')
      ->from('monhoc as m')
      ->where('m.MaMH', $mamon);
      $query = $this->db->get();
      if ($query->num_rows() > 0) 
      {
       return true;
      }
    }
    function Check_tenmon($tenmon)
    {
      $this->db->select('*')
      ->from('monhoc as m')
      ->where('m.TenMH', $tenmon);
      $query = $this->db->get();
      if ($query->num_rows() > 0) 
      {
       return true;
      }
    }
}
?>