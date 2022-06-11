<?php
class Tampil extends CI_Controller{
    public funcation index(){
        // Load model
        $this->load->model('mahasiswa_model');
        $mahasiswa = $this->mahasiswa_model->getAll();
        $data['mahasiswa'] = $mahasiswa;

        // Render View
        $this->load->view('layouts/header');
        $this->load->view('mahasiswa/tampil',| $data);
        $this->load->view('layouts/footer');
    }
}
?>