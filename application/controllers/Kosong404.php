<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kosong404 extends CI_Controller
{

    public function index()
    {
    	$data['judul'] = 'Masih Kosong, Gan! :(';
        $this->output->set_status_header('404');
        $this->load->view('templates/header', $data);
        $this->load->view('errors/kosong_404');
        $this->load->view('templates/footer');
    }
}
        
    /* End of file  Kosong404.php */
