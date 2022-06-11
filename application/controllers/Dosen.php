<?php
class Dosen extends CI_Controller{
    // membuat method index
    public function index(){
        $this->load->model('dosen_model');
        $dosen = $this->dosen_model->getAll();
        $data['dosen'] = $dosen;
        $this->load->view('layouts/header');
        $this->load->view('dosen/index', $data);
        $this->load->view('layouts/footer');
    }
    public function detail($id){
        //akses model dosen
        $this->load->model('dosen_model');
        $dosen = $this->dosen_model->getById($id);
        $data['dosen'] = $dosen;
        $this->load->view('layouts/header');
        $this->load->view('dosen/detail', $data);
        $this->load->view('layouts/footer');
    }
    public function form(){
        //render view
        $this->load->view('layouts/header');
        $this->load->view('dosen/form');
        $this->load->view('layouts/footer'); 
    }
    public function save(){
        //akses model dosen
        $this->load->model('dosen_model', 'dosen');
        $_id = $this->input->post('id');
        $_nama = $this->input->post('nama');
        $_tmp_lahir = $this->input->post('tmp_lahir');
        $_tgl_lahir = $this->input->post('tgl_lahir');
        $_gender = $this->input->post('gender');
        $_nidn = $this->input->post('nidn');
        $_pendidikan = $this->input->post('pendidikan');

        $data_dosen['id'] = $_id;
        $data_dosen['nama'] = $_nama;
        $data_dosen['tmp_lahir'] = $_tmp_lahir;
        $data_dosen['tgl_lahir'] = $_tgl_lahir;
        $data_dosen['gender'] = $_gender;
        $data_dosen['nidn'] = $_nidn;
        $data_dosen['pendidikan'] = $_pendidikan;

        if((!empty($_ide))){ //update
            $data_dosen['id'] = $_idedit;
            $this->dosen->update($data_dosen);
        }else{
            // data baru
            $this->dosen->simpan($data_dosen);
        }
        redirect('dosen','refresh');
    }
    public function edit($id){
        //akses model dosen
        $this->load->model('dosen_model','dosen');
        $obj_dosen = $this->dosen->getById($id);
        $data['obj_dosen'] = $obj_dosen;
        $this->load->view('layouts/header');
        $this->load->view('dosen/edit', $data);
        $this->load->view('layouts/footer');
    }
    public function delete($id){
        $this->load->model('dosen_model','dosen');
        //mengecek data dosen berdasarkan id
        $data_dosen['id'] = $id;
        $this->dosen->delete($data_dosen);
        redirect('dosen','refresh');
    }
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('/login');
    }
    }
    public function upload(){
        $_iddosen = $this->input->post("iddosen");
        $this->load->model('dosen_model', 'dosen');
        $dosen = $this->dosen->getById($_iddosen);
        $data['dosen']=$dosen;
        
        $config['upload_path'] = './uploads/photos';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 2894;
        $config['max_width'] = 2894;
        $config['max_height'] = 2894;
        $config['file_name'] = $dosen->id;

        //menginisialisasi file upload
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $data['error'] = $this->upload->display_errors();
        } else {
            $data['error'] = 'data sukses';
            $data['upload_data'] = $this->upload->data();
        }
        //kirim dan render ke detail
        $this->load->view('layouts/header');
        $this->load->view('dosen/detail', $data);
        $this->load->view('layouts/footer');
    }
}
?>