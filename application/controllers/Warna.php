<?php

class Warna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_warna');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Warna';
        $data['warna'] = $this->m_warna->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('mobil/warna/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Warna';
        $data['lastId'] = $this->m_warna->autoId();

        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mobil/warna/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->m_warna->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('warna');
        }
    }

    public function hapus($id)
    {
        $this->m_warna->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('warna');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Warna';
        $data['warna'] = $this->m_warna->getById($id);

        $this->form_validation->set_rules('warna', 'Warna', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mobil/warna/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_warna->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('warna');
        }
    }
}
