<?php

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_pegawai');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Pegawai';
        $data['pegawai'] = $this->m_pegawai->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('kepegawaian/pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Pegawai';
        $data['jabatan'] = $this->db->get('jabatan')->result_array();
        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('noTelp', 'noTelp', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kepegawaian/pegawai/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_pegawai->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pegawai');
        }
    }

    public function hapus($id)
    {
        $this->m_pegawai->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pegawai');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Pegawai';
        $data['pegawai'] = $this->m_pegawai->getById($id);
        $data['jabatan'] = $this->db->get('jabatan')->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('noTelp', 'noTelp', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kepegawaian/pegawai/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_pegawai->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pegawai');
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Pegawai';
        $data['pegawai'] = $this->m_pegawai->getById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('kepegawaian/pegawai/detail', $data);
        $this->load->view('templates/footer');
    }
}
