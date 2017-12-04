<?php
Class Nganhhoc extends MY_Controller
{
    function __construct()
    {
      parent::__construct();
      $this->load->model('Nganhhoc_model');
      $this->load->model('Khoahoc_model');
    }
    function index()
    {
      $data = array();
      $data['listnganhhoc'] = $this->Nganhhoc_model->Get_nganh();
      $data['temp'] = 'Giaovu/Nganhhoc/Nganhhoc';
      $this->load->view('Giaovu/index',$data);
    }
    function Add()
    {
        $manganh = $this->input->post('manganh');
        $tennganh = $this->input->post('tennganh');
        $data = array(
          'tennganh' => $this->input->post('tennganh'),
          'ma_nganhhoc' => $this->input->post('manganh')
        );
        $error = array(
          'msg' => '',
          'check' => true
        );
        if (($this->Nganhhoc_model->checkNH($manganh) == true)||($this->Nganhhoc_model->checktn($tennganh) == true)) {
          $error['msg'] = 'Mã Ngành Hoặc Tên Ngành Đã Tồn Tại';
        }
        else {
          if($this->Nganhhoc_model->create($data))
          {
            $error['check'] = true;
          }
          else {
              $error['check'] = false;
          }
        }
        echo json_encode($error);
    }
    function get_nganh()
    {
        $id = $this->input->post('nganhhoc_id');
        $data['nganhhoc_info'] = $this->Nganhhoc_model->Get_nganhbyid($id);
        echo json_encode($data);
    }
    function Edit()
    {
      $manganh = $this->input->post('manganh');
      $tennganh = $this->input->post('tennganh');
      $id = $this->input->post('idnganh');
        $data = array(
          'tennganh' => $this->input->post('tennganh'),
          'ma_nganhhoc' => $this->input->post('manganh')
        );
        $error = array(
          'msg' => '',
          'check' => false,
        );
        if ($this->Nganhhoc_model->checktn($tennganh) == true) {
          $error['msg'] = 'Tên Ngành Đã Tồn Tại';
        }
        else{
          if($this->Nganhhoc_model->update($id,$data))
          {
            $error['check'] = true;
          }
        }

        echo json_encode($error);
    }
    function Del()
        {
           $error = array(
          'check' => true,
         );
            $id = $this->input->post('nganhhoc_id');
              if($this->Khoahoc_model->Del_Nganhcheckkhoa($id) == false)
              {
                  //tạo ra nội dung thông báo
                $this->Nganhhoc_model->delete($id);
                 $error['check'] = true;
              }else
              {
                if ($this->Khoahoc_model->Del_Nganhcheckkhoa($id) == true) {
                  
                  $error['check'] = false;
                }
                 
              }
            echo json_encode($error);
         
        }
  }

 ?>
