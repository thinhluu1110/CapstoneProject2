<?php
Class Schedule extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('schedule_model');
    }
    
    /*
     * Hien thi Thoi Khoa Bieu
     */
    function index()
    {
        // //lay tong so luong ta ca cac san pham trong websit
        // $total_rows = $this->product_model->get_total();
        // $this->data['total_rows'] = $total_rows;
        
        // //load ra thu vien phan trang
        // $this->load->library('pagination');
        // $config = array();
        // $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        // $config['base_url']   = admin_url('product/index'); //link hien thi ra danh sach san pham
        // $config['per_page']   = 5;//so luong san pham hien thi tren 1 trang
        // $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        // $config['next_link']   = 'Trang kế tiếp';
        // $config['prev_link']   = 'Trang trước';
        // //khoi tao cac cau hinh phan trang
        // $this->pagination->initialize($config);
        
        // $segment = $this->uri->segment(4);
        // $segment = intval($segment);
        
        // $input = array();
        // $input['limit'] = array($config['per_page'], $segment);
        
        // //kiem tra co thuc hien loc du lieu hay khong
        // $id = $this->input->get('id');
        // $id = intval($id);
        // $input['where'] = array();
        // if($id > 0)
        // {
        //     $input['where']['id'] = $id;
        // }
        // $name = $this->input->get('name');
        // if($name)
        // {
        //     $input['like'] = array('name', $name);
        // }
        // $catalog_id = $this->input->get('catalog');
        // $catalog_id = intval($catalog_id);
        // if($catalog_id > 0)
        // {
        //     $input['where']['catalog_id'] = $catalog_id;
        // }
        
        // //lay danh sach san pha
        // $list = $this->product_model->get_list($input);
        // $this->data['list'] = $list;
       
        //lay danh sach danh muc san pham
        // $this->load->model('catalog_model');
        // $input = array();
        // $input['where'] = array('parent_id' => 0);
        // $catalogs = $this->catalog_model->get_list($input);
        // foreach ($catalogs as $row)
        // {
        //     $input['where'] = array('parent_id' => $row->id);
        //     $subs = $this->catalog_model->get_list($input);
        //     $row->subs = $subs;
        // }
        // $this->data['catalogs'] = $catalogs;
        
        if($this->input->post('submit'))
        {
            $this->load->library('upload_library');
            $upload_path = './upload/schedule';
            $data = $this->upload_library->upload($upload_path, 'image');
            pre($data);
        }

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/schedule/index';
        $this->load->view('admin/main', $this->data);
    }
}