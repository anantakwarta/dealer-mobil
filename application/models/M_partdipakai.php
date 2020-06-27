<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_partdipakai extends CI_Model {

	public function autoId()
	{
		$this->db->select("MAX(idPartDipakai)+1 AS idPartDipakai");
		$this->db->from("partdipakai");
		$query = $this->db->get();
		
		return $query->row();
	}

	public function tambahData()
	{
		$data = array(
			"idPartDipakai" => $this->input->post('id', true),
			"idPart" => $this->input->post('idPart', true),
			"jumlah" => $this->input->post('jumlah', true),
			"idJasaServis" => $this->input->post('idJasaServis', true),
		);

		$this->db->insert('partdipakai', $data);
	}

}

/* End of file M_partdipakai.php */
/* Location: ./application/models/M_partdipakai.php */