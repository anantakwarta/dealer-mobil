<?php

class Teknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_teknisi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Teknisi';
        $data['teknisi'] = $this->m_teknisi->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('kepegawaian/teknisi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Teknisi';
        $data['lastId'] = $this->m_teknisi->autoId();
        $data['coteknisi'] = $this->db->get('coteknisi')->result_array();

        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kepegawaian/teknisi/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_teknisi->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('teknisi');
        }
    }

    public function hapus($id)
    {
        $this->m_teknisi->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('teknisi');
    }

    public function ubah($id)
    {
        $data['coteknisi'] = $this->db->get('coteknisi')->result_array();
        $data['judul'] = 'Form Ubah Data Teknisi';
        $data['teknisi'] = $this->m_teknisi->getById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kepegawaian/teknisi/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_teknisi->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('teknisi');
        }
    }
}
