<?php
Class Khoahoc extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
			$this->load->model('Khoahoc_model');
      $this->load->model('Nganhhoc_model');
      $this->load->model('Kehoachdaotao_model');
		}
		function index()
		{
			$data = array();
      $idn = $this->input->post('nganhhoc');
      $data['listnganhhoc'] = $this->Nganhhoc_model->Get_nganh();
			$data['listkhoahoc1'] = $this->Khoahoc_model->Get_khoa();
      $data['listkhoahoc'] = $this->Khoahoc_model->Get_khoabyidn($idn);
			$data['temp'] = 'Giaovu/Khoahoc/Khoahoc';
			$this->load->view('Giaovu/index',$data);
		}
		function Add()
		{
			$tenkhoa = trim($this->input->post('tenkhoa'));
      $manganh = $this->input->post('nganhhoc_id');
			$data = array(
          	'nganhhoc_id' => $this->input->post('nganhhoc_id'),
			'tenkhoa' => trim($this->input->post('tenkhoa')),
			'nam_batdau' => $this->input->post('nambd'),
			'nam_ketthuc' => $this->input->post('namkt'),
			);
			$error = array
        	(
          		'msg' => '',
          		'check' => true
       		);
       		if ($this->Khoahoc_model->Check_Khoa($tenkhoa,$manganh) == true) {
       			$error['msg'] = 'Khóa học đã tồn tại trong hệ thống';
       		}
       		else
       		{
			     if($this->Khoahoc_model->create($data))
              {
                $error['check'] = true;
              }
              else
              {
                $error['check'] = false;
              }
			}
			echo json_encode($error);
		}
		function Edit()
		{
      $tenkhoa = trim($this->input->post('tenkhoa'));
      $manganh = $this->input->post('nganhhoc');
      $id = $this->input->post('idkhoa');
				$data = array(
          'nganhhoc_id' => $this->input->post('nganhhoc'),
					'tenkhoa' => trim($this->input->post('tenkhoa')),
					'nam_batdau' => $this->input->post('nambd'),
					'nam_ketthuc' => $this->input->post('namkt'),
				);
        $error = array(
              'msg' => '',
              'check' => true
          );

          if ($this->Khoahoc_model->Check_Khoa($tenkhoa,$manganh) == true) {
            $error['msg'] = 'Khóa học đã tồn tại trong hệ thống';
          }
          else{
          if($this->Khoahoc_model->update($id,$data))
              {

                $error['check'] = true;
              }
              else
              {
                $error['check'] = false;
              }
            }
				echo json_encode($error);
		}
		function Del()
        {
           $error = array(
            'check' => true,
          );
            $id = $this->input->post('khoahoc_id');
            if($this->Kehoachdaotao_model->Del_Khoacheckkhdt($id) == false)
            {
                  //tạo ra nội dung thông báo
                $this->Khoahoc_model->delete($id);
                 $error['check'] = true;
            }else{
                if ($this->Kehoachdaotao_model->Del_Khoacheckkhdt($id) == true) {
                  
                  $error['check'] = false;
                }

            }
            echo json_encode($error);
        }
        function get_khoa_nganh()
        {
        $id = $this->input->post('khoahoc_id');
        //$data['listnganhhoc'] = $this->Nganhhoc_model->get_list();
      
        $data['khoahoc_info'] = $this->Khoahoc_model->Get_khoaID($id);
        echo json_encode($data);
        }
	}

 ?>
