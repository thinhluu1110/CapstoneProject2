<?php
	Class Ketquahoctap_model extends MY_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		var $table = 'ketquahoctap';
		var $key = 'kqht_id';
		function get_Diem($idl,$idm,$idsv)
		{
			$this->db->select('*')
			->from('ketquahoctap as k')
			->join('lophoc as lh', 'k.lophoc_id = lh.lophoc_id')
			->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
			->join('sinhvien as s', 'k.sinhvien_id = s.MSSV')
			->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
			->join('hocki as h', 'k.hocki_id = h.hocki_id');
			$this->db->where('s.mssv', $idsv);
			$this->db->where('k.lophoc_id', $idl);
			$this->db->where('k.monhoc_id', $idm);
			$query = $this->db->get();
			return $query->result_array();
		}
		function get_Diem_kqht($idl,$idm)
		{
			$this->db->select('*')
			->from('ketquahoctap as k')
			->join('lophoc as lh', 'k.lophoc_id = lh.lophoc_id')
			->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
			->join('sinhvien as s', 'k.sinhvien_id = s.MSSV')
			->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
			->join('hocki as h', 'k.hocki_id = h.hocki_id');
			$this->db->where('k.lophoc_id', $idl);
			$this->db->where('k.monhoc_id', $idm);
			$query = $this->db->get();
			return $query->result_array();
		}
		function get_Diem_timkiemkqht($mssv)
		{
			$this->db->select('*')
			->from('ketquahoctap as k')
			->join('lophoc as lh', 'k.lophoc_id = lh.lophoc_id')
			->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
			->join('sinhvien as s', 'k.sinhvien_id = s.MSSV')
			->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
			->join('hocki as h', 'k.hocki_id = h.hocki_id')
			->where('k.sinhvien_id', $mssv);
			$query = $this->db->get();
			return $query->result_array();
		}
		function get_Diem_SV($mssv,$idn,$idk)
		{
			$this->db->select('*')
			->from('ketquahoctap as k')
			->join('sinhvien as s', 'k.sinhvien_id = s.MSSV')
			->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
			->join('kehoachdaotao as khdt', 'khdt.monhoc_id = k.monhoc_id')
			->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
			->where('k.sinhvien_id', $mssv)
			->where('khdt.nganhhoc_id', $idn)
			->where('khdt.khoahoc_id', $idk);
			$query = $this->db->get();
			return $query->result_array();
		}
		function checkDiem($idm,$idsv,$idhk)
		{
			$this->db->select('*')
			->from('ketquahoctap as k')
			->where('k.monhoc_id', $idm)
			->where('k.sinhvien_id', $idsv)
			->where('k.hocki_id', $idhk);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->row_array();
			}
			else {
				return false;
			}
		}
		function checkMon($idl)
		{
			$this->db->select('*')
			->from('ketquahoctap as k')
			->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
			->where('k.lophoc_id', $idl);
			$query = $this->db->get();
			return $query->result_array();
		}
		function run_sp(){
      		$this->db->query("CALL ImportKqht()");
    	}
    	function cancel_sp(){
      		$this->db->empty_table('ketquahoctap_tam');
    	}
    	function Del_Moncheckkqht($idm)
    	{
	      $this->db->select('*')
	      ->from('ketquahoctap as kqht')
	      ->join('monhoc as m', 'kqht.monhoc_id = m.monhoc_id')
	      ->where('kqht.monhoc_id',$idm);
	      $query = $this->db->get();
	      if ($query->num_rows() > 0) {
	        return true;
	      }
	      else{
	        return false;
	      }
    	}
	    function Del_Lopcheckkqht($idl)
	    {
	      $this->db->select('*')
	      ->from('ketquahoctap as kqht')
	      ->join('lophoc as l', 'kqht.lophoc_id = l.lophoc_id')
	      ->where('kqht.lophoc_id',$idl);
	      $query = $this->db->get();
	      if ($query->num_rows() > 0) {
	        return true;
	      }
	      else{
	        return false;
	      }
	    }
	    function get_Diem_Chitiet($idn, $idk, $idsv)
		{
			$this->db->select('*')
			->from('ketquahoctap as k')
			->join('sinhvien as s', 'k.sinhvien_id = s.MSSV')
			->join('monhoc as m', 'k.monhoc_id = m.monhoc_id')
			->join('kehoachdaotao as khdt', 'khdt.monhoc_id = k.monhoc_id')
			->join('nganhhoc as n', 'k.nganhhoc_id = n.nganhhoc_id')
			->where('s.mssv', $idsv)
			->where('khdt.nganhhoc_id', $idn)
			->where('khdt.khoahoc_id', $idk);
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>
