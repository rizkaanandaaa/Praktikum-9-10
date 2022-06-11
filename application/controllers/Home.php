<?php
class Home extends CI_Controller{
    public funcation index(){
        // Merender method atau propertyy yang ada di dalam object views
        $this->load->view('home/index');
    }
}
?>