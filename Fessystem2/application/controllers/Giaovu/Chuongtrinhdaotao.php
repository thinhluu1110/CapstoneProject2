<?php
Class Chuongtrinhdaotao extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Chuongtrinhdaotao_model');
      $this->load->model('Khoahoc_model');
      $this->load->model('Nganhhoc_model');
		}
		function index()
		{
			$input = array();
      $listnganhhoc = $this->Nganhhoc_model->get_list();
      $idn = $this->input->post('nganhhoc');
      $idk = $this->input->post('khoahoc');
			if($idn)
			{
				$data['listkhoahoc'] = $this->Khoahoc_model->filter_Khoa($idn);
        $data['listCTDT'] = $this->Chuongtrinhdaotao_model->getAll($idn);
			}
			if ($idn && $idk) {
				$data['listCTDT'] = $this->Chuongtrinhdaotao_model->getFilebyNK($idn,$idk);
			}
      $data['listnganhhoc'] = $listnganhhoc;
			//$list = $this->semester_model->get_list();
			$data['temp'] = 'Giaovu/Chuongtrinhdaotao/Chuongtrinhdaotao';
			//$data['list'] = $list;
			$this->load->view('Giaovu/index',$data);
		}
    function importCTDT()
    {
      $data = array(
            'khongchonfile' => '',
            'msg' => '',
            'check' => false,
            //'UpdateSucess' => '',
            //'UpdateError' => ''
            //'ReviewImage' => ''
        );
        $nganh=$this->input->post('manganh');
        $khoa=$this->input->post('makhoa');

        // if (!empty($_FILE['file']['tmp_name'])) {
        $check1 = $this->Chuongtrinhdaotao_model->checkCTDT($nganh,$khoa);
        if ($check1 == true) {
          $this->load->library('uploadword_library');
          $upload_path = './upload/CTDT';
          $upload_data = $this->uploadword_library->upload($upload_path,'file');
          $file = '';
          if(isset($upload_data['file_name']))
            {
                $file = $upload_data['file_name'];

            $data = array(
                    'khoahoc_id' => $khoa,
                    'nganhhoc_id' => $nganh,
                    'noidung' => $file,
                );
            if($this->Chuongtrinhdaotao_model->create($data))
            {
                //tạo ra nội dung thông báo
                $data['check'] = true;
            }
          }
          else{
            $data['khongchonfile'] = 'Vui Lòng Chọn File';
          }
        }
        else{
          $data['msg'] = 'Chương Trình Đào Tạo Của Khóa Này Đã Tồn Tại';
        }
        echo json_encode($data);
    }
      function editCTDT($idk,$idn)
      {
        $data['listkhoa'] = $this->Khoahoc_model->Get_khoa();
        $data['listnganh'] = $this->Nganhhoc_model->Get_nganh();
        $data['fileWord'] = $this->Chuongtrinhdaotao_model->getfileWord($idk,$idn);
        $this->load->view('Giaovu/Chuongtrinhdaotao/Editctdt',$data);
      }
      function editFILE()
      {
        $error  = array(
        'khongchonfile' => '',
        'thanhcong' => '',
        'UploadError' => ''
        );
        $this->load->library('uploadword_library');
        $upload_path = './upload/CTDT';
        $upload_data = $this->uploadword_library->upload($upload_path,'file');

        if (isset($upload_data['file_name'])) {
          $file = $upload_data['file_name'];
          $id = $this->input->post('mactdt');
          $ghichu = $this->input->post('ghichu');
          $tenfile = $this->Chuongtrinhdaotao_model->Get_ctdtID($id);
          $check=unlink('upload/CTDT/'.$tenfile['noidung']);
          $data = array(
                    'noidung' => $file,
                    'ghichu' => $ghichu,
                );
          if ($this->Chuongtrinhdaotao_model->update($id,$data)) {
            $error['thanhcong'] = "Sửa Thành Công";
          }
        }
        else{
          $error['khongchonfile'] = 'Vui Lòng Chọn File';
        }
        echo json_encode($error);
          }
      function Download($id)
      {
        $this->load->helper('download');
        $fileInfo = $this->Chuongtrinhdaotao_model->getFile($id);

        $file = 'upload/CTDT/'.$fileInfo['noidung'];

        force_download($file,NULL);
      }
      function get_ctdt()
        {
        $id = $this->input->post('ctdt_id');
        //$data['listnganhhoc'] = $this->Nganhhoc_model->get_list();

        $data['ctdt_info'] = $this->Chuongtrinhdaotao_model->Get_ctdtID($id);
        echo json_encode($data);
        }
}
?>
