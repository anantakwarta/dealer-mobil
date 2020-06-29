<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model {

	public function viewByCarSold()
	{
		$this->db->select('t.idTransaksi, k.namaKons, p.namaPegawai, m.model, mk.namaMerk, t.tanggal, m.harga');
        $this->db->from('transaksi t');
        $this->db->join('pegawai p', 'p.idPegawai=t.idPegawai');
        $this->db->join('konsumen k', 'k.idKons=t.idKons');
        $this->db->join('mobil m', 'm.idMobil=t.idMobil');
        $this->db->join('merk mk', 'mk.idMerk = m.idMerk');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function viewByService()
	{
		$this->db->select('js.idJasaServis, js.idTransaksi, js.tanggalDiterima, js.hargaTotal, js.tanggalDikembalikan, s.namaServis, p.namaPart, mk.namaMerk, m.model, pd.jumlah, t.tanggal');
        $this->db->from('jasaservis js');
        $this->db->join('transaksi t', 't.idTransaksi=js.idTransaksi', 'left');
        $this->db->join('mobil m', 'm.idMobil = js.idMobil', 'left');
        $this->db->join('merk mk', 'mk.idMerk = m.idMerk');
        $this->db->join('servisteknisi st', 'st.idJasaServis=js.idJasaServis', 'left');
        $this->db->join('servis s', 's.idServis=st.idServis','left');
        $this->db->join('partdipakai pd', 'pd.idJasaServis=js.idJasaServis', 'left');
        $this->db->join('part p', 'pd.idPart=p.idPart','left');
        $query = $this->db->get();
        return $query->result_array();
	}

}

/* End of file M_report.php */
/* Location: ./application/models/M_report.php */