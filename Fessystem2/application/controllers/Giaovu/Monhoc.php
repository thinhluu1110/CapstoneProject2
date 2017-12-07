<?php
Class Monhoc extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
			$this->load->model('Monhoc_model');
      $this->load->model('Ketquahoctap_model');

		}
		function index()
		{
			$data = array();
			$data['listmonhoc'] = $this->Monhoc_model->get_monhoc();
			$data['temp'] = 'Giaovu/Monhoc/Monhoc';
			$this->load->view('Giaovu/index',$data);
		}
		function Add()
		{
				$mamon = trim($this->input->post('mamonhoc'));
        $tenmon = trim($this->input->post('tenmonhoc'));  	
				$data = array(
					'MaMH' => trim($this->input->post('mamonhoc')),
					'TenMH' => trim($this->input->post('tenmonhoc'))
				);
				$error = array
				(
					'msg' => '',
          			'check' => true
				);
				if (($this->Monhoc_model->Check_Mon($mamon) == true) || ($this->Monhoc_model->Check_tenmon($tenmon) == true)) 
				{
					$error['msg'] = 'Mã Môn Hoặc Tên Môn Đã Tồn Tại Trong Hệ Thống';
				}
				else
       			{
				if($this->Monhoc_model->create($data))
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
			$mamon = $this->input->post('mamon');
      $tenmon = trim($this->input->post('tenmon'));
      		$id = $this->input->post('idmon');
        	$data = array(
          		'TenMH' => trim($this->input->post('tenmon')),
          		'MaMH' => $this->input->post('mamon')
        	);
        	$error = array(
          		'msg' => '',
          		'check' => true
        	);
          if ($this->Monhoc_model->Check_tenmon($tenmon) == true) {
            $error['msg'] = 'Tên Môn Đã Tồn Tại Trong Hệ Thống';
          }
          else{
          	if($this->Monhoc_model->update($id,$data))
          	{
            	$error['check'] = true;
          	}
          	else {
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
            $id = $this->input->post('monhoc_id');
            if($this->Ketquahoctap_model->Del_Moncheckkqht($id) == false)
            {
                  //tạo ra nội dung thông báo
                $this->Monhoc_model->delete($id);
                 $error['check'] = true;
            }else{
                if ($this->Ketquahoctap_model->Del_Moncheckkqht($id) == true) {
                  
                  $error['check'] = false;
                }
            }
            echo json_encode($error);
        }
        function get_mon()
    	{
        	$id = $this->input->post('monhoc_id');
        	$data['monhoc_info'] = $this->Monhoc_model->Get_monhocbyid($id);
        	echo json_encode($data);
    	}
	}

 ?>
