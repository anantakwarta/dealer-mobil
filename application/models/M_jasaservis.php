<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jasaservis extends CI_Model {

	public function autoId()
	{
		$this->db->select("MAX(idJasaServis)+1 AS idJasaServis");
		$this->db->from("jasaservis");
		$query = $this->db->get();

		return $query->row();
	}

	public function getByKons($id)
    {
        $this->db->select('jasaservis.idJasaServis, jasaservis.tanggalDiterima, jasaservis.hargaTotal, jasaservis.tanggalDikembalikan, servis.namaServis, part.namaPart, merk.namaMerk, mobil.model, partdipakai.jumlah');
        $this->db->from('jasaservis');
        $this->db->join('transaksi', 'transaksi.idTransaksi=jasaservis.idTransaksi', 'left');
        $this->db->join('mobil', 'mobil.idMobil = jasaservis.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerk = mobil.idMerk');
        $this->db->join('servisteknisi', 'servisteknisi.idJasaServis=jasaservis.idJasaServis', 'left');
        $this->db->join('servis', 'servis.idServis=servisteknisi.idServis','left');
        $this->db->join('partdipakai', 'partdipakai.idJasaServis=jasaservis.idJasaServis', 'left');
        $this->db->join('part', 'partdipakai.idPart=part.idPart','left');
        $this->db->where('jasaservis.idKons', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

	public function tambahData()
	{
		$now = date('Y-m-d h:m:s');
		$data = array(
            "idJasaServis" => $this->input->post('id', true),
            "idTransaksi" => $this->input->post('idTransaksi', true),
            "idMobil" => $this->input->post('idMobil', true),
            "idKons" => $this->input->post('idKons', true),
            "tanggalDiterima" => $now,
            "tanggalDikembalikan" => NULL,
            "hargaTotal" => 0,
        );

        $this->db->insert('jasaservis', $data);
	}

    public function hapusData($id)
    {
        $this->db->where('idJasaServis', $id);
        $this->db->delete('jasaservis');
    }
}

/* End of file M_jasaservis.php */
/* Location: ./application/models/M_jasaservis.php */