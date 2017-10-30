<?php
Class Lichthi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model lich thi
        $this->load->model('lichthi_model');
    }

    /*
     * Hien thi Lich Thi
     */
    function index()
    {
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        //kiem tra co thuc hien loc du lieu hay khong
        //fillter Khoa hoc
        $ech_khoa_hoc = $this->input->get('Khoahoc');
        $ech_khoa_hoc = intval($ech_khoa_hoc);
        $input['where'] = array();
        if($ech_khoa_hoc > 0)
        {
            $input['where']['ech_khoa_hoc'] = $ech_khoa_hoc;
        }

        //fillter Hoc ki
        $ech_hoc_ki = $this->input->get('Hocki');
        $ech_hoc_ki = intval($ech_hoc_ki);
        if($ech_hoc_ki > 0)
        {
            $input['where']['ech_hoc_ki'] = $ech_hoc_ki;
        }

        //fillter Lan thi
        $ech_lan_thi = $this->input->get('Lanthi');
        if($ech_lan_thi > 0)
        {
            $input['where']['ech_lan_thi'] = $ech_lan_thi;
        }

        //lay danh sach lich thi
        $listLichthi = $this->lichthi_model->get_list($input);
        $this->data['listLichthi'] = $listLichthi;

        //lay danh sach khoa hoc
        $this->load->model('khoahoc_model');
        $input = array();
        $listkhoahoc = $this->khoahoc_model->get_list($input);
        $this->data['listkhoahoc'] = $listkhoahoc;

        //lay daanh sach hoc ki
        $this->load->model('hocki_model');
        $input = array();
        $listhocki = $this->hocki_model->get_list($input);
        $this->data['listhocki'] = $listhocki;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // //load view
        $this->data['temp'] = 'Giaovu/Lichthi/Lichthi';
        $this->load->view('Giaovu/index', $this->data);
    }

    function add()
    {
        if($this->input->post('submit'))
        {
            //them vao csdl
            $khoahoc = $this->input->post('Khoahoc');
            $hocki = $this->input->post('Hocki');
            $lanthi = $this->input->post('Lanthi');

            //lay ten file anh để upload
            $this->load->library('upload_library');
            $upload_path = './upload/Lichthi';
            $upload_data = $this->upload_library->upload($upload_path, 'image');
            //pre($upload_data);

            $sch_image = '';
            if(isset($upload_data['file_name']))
            {
                $sch_image = $upload_data['file_name'];
            }

            //luu du lieu can them
            $data = array(
                'ech_khoa_hoc' => $khoahoc,
                'ech_hoc_ki' => $hocki,
                'ech_lan_thi' => $lanthi,
                'ech_image' => $sch_image,
            );
            //them moi vao csdl
            if($this->lichthi_model->create($data))
            {
                //tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
            }else{
                $this->session->set_flashdata('message', 'Không thêm được');
            }
        }
    }
}
