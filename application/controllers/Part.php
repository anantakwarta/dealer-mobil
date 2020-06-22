<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Part extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_part');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Part';
        $data['part'] = $this->m_part->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('servis/part/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Part';
        $data['lastId'] = $this->m_part->autoId();

        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('part', 'part', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('servis/part/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->m_part->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('part');
        }
    }

    public function hapus($id)
    {
        $this->m_part->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('part');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Part';
        $data['part'] = $this->m_part->getById($id);

        $this->form_validation->set_rules('part', 'Part', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('servis/part/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_part->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('part');
        }
    }
}
        
    /* End of file  part.php */
