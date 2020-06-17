<?php

class Jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_jabatan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Jabatan';
        $data['jabatan'] = $this->m_jabatan->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('kepegawaian/jabatan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Jabatan';

        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kepegawaian/jabatan/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->m_jabatan->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('jabatan');
        }
    }

    public function hapus($id)
    {
        $this->m_jabatan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('jabatan');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Jabatan';
        $data['jabatan'] = $this->m_jabatan->getById($id);

        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kepegawaian/jabatan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_jabatan->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('jabatan');
        }
    }
}
