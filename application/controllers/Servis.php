<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Servis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_servis');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Servis';
        $data['servis'] = $this->m_servis->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('servis/servis/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Servis';
        $data['lastId'] = $this->m_servis->autoId();

        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('servis', 'servis', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('servis/servis/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->m_servis->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('servis');
        }
    }

    public function hapus($id)
    {
        $this->m_servis->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('servis');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Servis';
        $data['servis'] = $this->m_servis->getById($id);

        $this->form_validation->set_rules('servis', 'Servis', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('servis/servis/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_servis->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('servis');
        }
    }
}
        
    /* End of file  servis.php */
