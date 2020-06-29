<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('m_report');
	}

	public function index()
	{
	    $data['judul'] = 'Laporan Transaksi Penjualan dan Servis';
    	$ket = 'Laporan Semua Transaksi';
    	$cetak = 'report/cetak';
    	$transaksi = $this->m_report->viewByCarSold();
        $jasaservis = $this->m_report->viewByService();
	    $data['ket'] = $ket;
	    $data['url_cetak'] = base_url('index.php/'.$cetak);
	    $data['transaksi'] = $transaksi;
	    $data['jasaservis'] = $jasaservis;
	    
	    $this->load->view('templates/header', $data);
	    $this->load->view('report/index', $data);
	    $this->load->view('templates/footer');
    }

    public function cetak()
    {        
    	$ket = 'Laporan Semua Transaksi';
        $report = $this->m_report->viewByCarSold();
        $report2 = $this->m_report->viewByService();
        $data['ket'] = $ket;
        $data['report'] = $report;
        $data['report2'] = $report2;

		$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
	    $html = $this->load->view('report/print', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan'.mdate('%Y-%m-%d').'.pdf','D');
    }
}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */