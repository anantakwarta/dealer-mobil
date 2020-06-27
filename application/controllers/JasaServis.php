<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JasaServis extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('m_jasaservis');
		$this->load->model('m_servisteknisi');
		$this->load->model('m_partdipakai');
		$this->load->model('m_transaksi');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Pilih Konsumen';
		$this->load->model('m_konsumen');
		$data['konsumen'] = $this->m_konsumen->getAll();

		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/servis/index', $data);
		$this->load->view('templates/footer');
	}

	public function tampilTiket()
	{
		$data['judul'] = 'Data Tiket Servis';
		$data['get'] = $this->input->get('id', true);
		$data['jasaservis'] = $this->m_jasaservis->getByKons($data['get']);
		$data['konsumen'] = $this->db->get_where('konsumen', ['idKons' => $data['get']])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/servis/tampilTiket', $data);
		$this->load->view('templates/footer');
	}

	public function tambahTiket()
	{
		$data['judul'] = 'Form Tiket Jasa Servis';
		$data['get'] = $this->input->get('id', true);

		$data['lastId'] = $this->m_jasaservis->autoId();
		$data['transaksi'] = $this->m_transaksi->getByKons($data['get']);

		$this->form_validation->set_rules('id', 'ID', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/servis/tambahTiket', $data);
			$this->load->view('templates/footer');
        } else {
            $this->m_jasaservis->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('jasaServis');
        }

	}

	public function hapus($id)
	{
		$this->m_jasaservis->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('jasaServis');
	}

	public function servis($id)
	{
		$data['judul'] = 'Tambah Servis Mobil';
		$data['idJasaServis'] = $id;
		$data['servis'] = $this->db->get('servis')->result_array();
		$data['lastId'] = $this->m_servisteknisi->autoId();

		$this->form_validation->set_rules('id', 'ID', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/servis/tambahServis', $data);
			$this->load->view('templates/footer');
        } else {
            $this->m_servisteknisi->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('jasaServis');
        }
	}

	public function part($id)
	{
		$data['judul'] = 'Ganti Part Mobil';
		$data['idJasaServis'] = $id;
		$data['part'] = $this->db->get('part')->result_array();
		$data['lastId'] = $this->m_partdipakai->autoId();

		$this->form_validation->set_rules('id', 'ID', 'required|numeric');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/servis/tambahPart', $data);
			$this->load->view('templates/footer');
        } else {
            $this->m_partdipakai->tambahData();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('jasaServis');
        }
	}

}

/* End of file JasaServis.php */
/* Location: ./application/controllers/JasaServis.php */
 ?>