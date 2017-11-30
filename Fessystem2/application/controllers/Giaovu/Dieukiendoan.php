<?php
Class Dieukiendoan extends MY_Controller
{
    function __construct()
		{
			parent::__construct();
      $this->load->model('Nganhhoc_model');
      $this->load->model('Monhoc_model');
      $this->load->model('Khoahoc_model');
      $this->load->model('Kehoachdaotao_model');
      $this->load->model('Dieukiendoan_model');
		}
		function index()
		{
      $listnganhhoc = $this->Nganhhoc_model->get_list();
      $idn = $this->input->get('nganhhoc');
      $idk = $this->input->get('khoahoc');
      if($idn)
			{
        $data['listkhoahoc'] = $this->Khoahoc_model->Get_khoabyidn($idn);
			}
      if($idn && $idk)
      {
      $data['listDKDA']=$this->Dieukiendoan_model->getdkby_nganhkhoa($idn,$idk);
      if (count($data['listDKDA'])>0) {
        $data['listDKDA'][0]['moncam'] = explode(',',$data['listDKDA'][0]['moncam']);
        foreach ($data['listDKDA'][0]['moncam'] as  $value) {
          $data['listDKDA'][0]['mamoncam'][] = $this->Monhoc_model->Get_monhocbyid($value);
        }
      }
      }
      $data['listnganhhoc'] = $listnganhhoc;
			$data['temp'] = 'Giaovu/Doan/Dieukiendoan';
			$this->load->view('Giaovu/index',$data);
		}
    function getmonby_nganhkhoa()
    {
      $idn = $this->input->post('nganhhoc_id');
      $idk = $this->input->post('khoahoc_id');
      $mon = $this->Kehoachdaotao_model->getmonby_nganhkhoa($idk,$idn);
      if (count($mon)>0) {
        $mon_selec_box = '';
        $mon_selec_box .= '<option value = "">--- Chọn Môn Học ---</option>';
        foreach ($mon as  $row) {
          $mon_selec_box .= '<option value = "'.$row['monhoc_id'].'">'.$row['TenMH'].'</option>';
        }
        echo json_encode($mon_selec_box);
      }
    }
    function Add()
    {
        $mon = $this->input->post('listmon[]');
        $mon_cam = '';
        $count = 0;
        if (!empty($mon)) {
          $count = count($mon);
          $mon_cam = implode(",",$mon);
        }

//         if (is_null($this->input->post('maxmonno'))) {
//           $maxmonno = 0;
//         }
// else{
//   $maxmonno = $this->input->post('maxmonno');
// }
        $idn = $this->input->post('nganhhoc');
        $idk = $this->input->post('khoahoc');
        $data = array(
          'nganhhoc_id' => $this->input->post('nganhhoc'),
          'khoahoc_id' =>$this->input->post('khoahoc'),
          'max_monno' =>$this->input->post('maxmonno'),
          'moncam' =>$mon_cam,
        );
        $error['tontaidk'] = '';
        $error['thanhcong'] = '';
        $error['thatbai'] = '';
        $check = $this->Dieukiendoan_model->checkdkda($idn,$idk);

          if ($check == true) {
            $error['tontaidk'] = "Điều Kiện Đồ Án Cho Khóa Này Đã Tồn Tại";
          }
          else {
          if ($this->Dieukiendoan_model->create($data)) {
            $error['thanhcong'] = "Tạo Điều Kiện Đồ Án Thành Công";
          }
          else {
              $error['thatbai'] = "Tạo Điều Kiện Đồ Án Thất Bại";
          }
        }
        echo json_encode($error);
    }
    function Del()
        {
           $error = array(
            'check' => true,
          );
            $id = $this->input->post('dkda_id');
            if($this->Dieukiendoan_model->delete($id))
            {
                  //tạo ra nội dung thông báo
                 $error['check'] = true;
            }else{
                  
                  $error['check'] = false;
                

            }
            echo json_encode($error);
        }
    
    function get_dkda()
    {
      $id = $this->input->post('dkda_id');
      $data['dkda_info'] = $this->Dieukiendoan_model->getdkda_byid($id);
      $idk = $data['dkda_info']['khoahoc_id'];
      $idn = $data['dkda_info']['nganhhoc_id'];
      if (count($data['dkda_info'])>0) {
        $data['dkda_info']['moncamreview'] = "";
        $info['dkda_info']['moncam'] = explode(',',$data['dkda_info']['moncam']);
        foreach ($info['dkda_info']['moncam'] as  $value) {
          $info['dkda_info']['mamoncam'][] = $this->Monhoc_model->Get_monhocbyid($value);
        }
        foreach ($info['dkda_info']['mamoncam'] as  $value) {
          $data['dkda_info']['moncamreview'] .= '<li style="padding: 5px 10px; position: relative; background: #eaeaea; margin-bottom: 5px" id="m'.$value['monhoc_id'].'"><input type="hidden" name="listmon[]" value="'.$value['monhoc_id'].'"/>'.$value['TenMH'].'<i onclick="delete_li(this)" style="position: absolute; top:0; right: 0; padding: 5px 15px; cursor: pointer;">x</i></li>';
        }
        $mon = $this->Kehoachdaotao_model->getmonby_nganhkhoa($idk,$idn);
        if (count($mon)>0) {
          $data['dkda_info']['listmoncam'] = '';
          $data['dkda_info']['listmoncam'] .= '<option value = "">--- Chọn Môn Học ---</option>';
          foreach ($mon as  $row) {
            $data['dkda_info']['listmoncam'] .= '<option value = "'.$row['monhoc_id'].'">'.$row['TenMH'].'</option>';
          }
        }
      }
      echo json_encode($data);
    }
    function Edit()
    {
      $mon = $this->input->post('listmon[]');
      $iddk = $this->input->post('id_dkda');
      $idmax = $this->input->post('maxmonno');
      $mon_cam = '';
      $count = 0;
      if (!empty($mon)) {
        $count = count($mon);
        $mon_cam = implode(",",$mon);
      }
      $data = array(
        'max_monno' =>$this->input->post('maxmonno'),
        'moncam' =>$mon_cam,
      );
      $error['thanhcong'] = '';
      $error['thatbai'] = '';
        

        if ($this->Dieukiendoan_model->update($iddk,$data)) {
          $error['thanhcong'] = "Sửa Điều Kiện Đồ Án Thành Công";
        }
        else {
            $error['thatbai'] = "Tạo Điều Kiện Đồ Án Thất Bại";
        }

      echo json_encode($error);
    }
	}

 ?>
