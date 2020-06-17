<?php

class Mobil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_mobil');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Mobil';
        $data['mobil'] = $this->m_mobil->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('mobil/mobil/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $tahun = array();
        for ($i = 2020; $i >= 1980; $i--) {
            $tahun[] = array('tahun' => $i);
        }
        $data['tahun'] = $tahun;
        $data['judul'] = 'Form Tambah Data Mobil';
        $data['merk'] = $this->db->get('merk')->result_array();
        $data['warna'] = $this->db->get('warna')->result_array();
        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mobil/mobil/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_mobil->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mobil');
        }
    }

    public function hapus($id)
    {
        $this->m_mobil->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mobil');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mobil';
        $data['merk'] = $this->db->get('merk')->result_array();
        $data['warna'] = $this->db->get('warna')->result_array();
        $data['mobil'] = $this->m_mobil->getById($id);
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mobil/mobil/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_mobil->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mobil');
        }
    }
}
