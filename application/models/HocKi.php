<?php
class HocKi extends CI_Model
{
    // public $MaHocKi;
    // public $TenHocKi;
    // public $MaKhoaHoc;
    functions __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    functions get_list()
    {
      $this->db->select();
      $query = $this->db->get('course');
      return $query->result();
    }
}
