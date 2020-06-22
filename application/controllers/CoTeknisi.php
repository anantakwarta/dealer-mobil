<?php

class Coteknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_coteknisi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Teknisi Pembantu';
        $data['coteknisi'] = $this->m_coteknisi->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('kepegawaian/coteknisi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Teknisi Pembantu';
        $data['lastId'] = $this->m_coteknisi->autoId();
        
        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kepegawaian/coteknisi/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->m_coteknisi->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('coteknisi');
        }
    }

    public function hapus($id)
    {
        $this->m_coteknisi->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('coteknisi');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Teknisi Pembantu';
        $data['coteknisi'] = $this->m_coteknisi->getById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kepegawaian/coteknisi/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_coteknisi->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('coteknisi');
        }
    }
}
