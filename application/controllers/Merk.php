<?php

class Merk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_merk');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Merk';
        $data['merk'] = $this->m_merk->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('mobil/merk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Merk';

        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mobil/merk/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->m_merk->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('merk');
        }
    }

    public function hapus($id)
    {
        $this->m_merk->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('merk');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Merk';
        $data['merk'] = $this->m_merk->getById($id);

        $this->form_validation->set_rules('merk', 'Merk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mobil/merk/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_merk->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('merk');
        }
    }
}
