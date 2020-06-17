<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_konsumen');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Konsumen';
        $data['konsumen'] = $this->m_konsumen->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('konsumen/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Konsumen';
        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('noTelp', 'noTelp', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('konsumen/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_konsumen->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('konsumen');
        }
    }

    public function hapus($id)
    {
        $this->m_konsumen->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('konsumen');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Konsumen';
        $data['konsumen'] = $this->m_konsumen->getById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('noTelp', 'noTelp', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('konsumen/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_konsumen->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('konsumen');
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Konsumen';
        $data['konsumen'] = $this->m_konsumen->getById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('konsumen/detail', $data);
        $this->load->view('templates/footer');
    }
}
        
    /* End of file  Konsumen.php */
