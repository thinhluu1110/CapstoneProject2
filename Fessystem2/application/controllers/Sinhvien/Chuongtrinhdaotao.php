<?php
class Chuongtrinhdaotao extends MY_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Chuongtrinhdaotao_model');
	}
	function index($idn,$idk)
	{
		$this->load->helper('download');
		$fileInfo = $this->Chuongtrinhdaotao_model->getFilebyNK($idn,$idk);
		if (count($fileInfo)>0) {
			$file = 'upload/CTDT/'.$fileInfo[0]['noidung'];
			force_download($file,NULL);
		}
	}
}
?>
