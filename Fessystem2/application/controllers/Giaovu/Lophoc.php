<?php
Class Lophoc extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
			     $this->load->model('Khoahoc_model');
      		$this->load->model('Nganhhoc_model');
      		$this->load->model('Lophoc_model');
          $this->load->model('Monhoc_model');
          $this->load->model('Ketquahoctap_model');
		}
		function index()
		{
			$data = array();
      $data['listlophoc'] = $this->Lophoc_model->Get_lop();
      $data['listmonhoc'] = $this->Monhoc_model->get_monhoc();
			$data['temp'] = 'Giaovu/Lophoc/Lophoc';
			$this->load->view('Giaovu/index',$data);
		}

		function Add()
    {
      
        $tenlop = $this->input->post('tenlop');
        $data = array(
          // 'khoahoc_id' => $this->input->post('khoahoc'),
          'tenlop' => $this->input->post('tenlop')
        );
        $error = array
        (
          'msg' => '',
          'check' => true
        );
        if ($this->Lophoc_model->Check_Lop($tenlop) == true) 
        {
          $error['msg'] = 'Tên lớp đã tồn tại trong hệ thống';
        }
        else
        {
          if($this->Lophoc_model->create($data))
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
       $id = $this->input->post('idlop');
        $tenlop = $this->input->post('tenlop');
        $data = array
        (
          'tenlop' => $this->input->post('tenlop'),
        );
        $error = array
        (
          'msg' => '',
          'check' => true
        );
        if ($this->Lophoc_model->Check_Lop($tenlop) == true) 
        {
          $error['msg'] = 'Tên lớp đã tồn tại trong hệ thống';
        }
        else
        {
          if($this->Lophoc_model->update($id,$data))
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
            $id = $this->input->post('lophoc_id');
              if($this->Ketquahoctap_model->Del_Lopcheckkqht($id) == false)
              {
                 $this->Lophoc_model->delete($id);
                 $error['check'] = true;
              }else{
                 if($this->Ketquahoctap_model->Del_Lopcheckkqht($id) == true)
                 {
                  $error['check'] = false;
                 }
              }
            echo json_encode($error);
        }
    function get_lop()
    {
        $id = $this->input->post('lophoc_id');
        $data['lophoc_info'] = $this->Lophoc_model->Get_lopbyid($id);
        echo json_encode($data);
    }
	}

 ?>
