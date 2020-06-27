<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_servisteknisi extends CI_Model {

	public function autoId()
	{
		$this->db->select("MAX(idServisTeknisi)+1 AS idServisTeknisi");
		$this->db->from("servisteknisi");
		$query = $this->db->get();
		
		return $query->row();
	}

	public function tambahData()
	{
		$now = date_timestamp_set('h:m:s');
		$data = array(
        "idServisTeknisi" => $this->input->post('id', true),
        "idJasaServis" => $this->input->post('idJasaServis', true),
        "idTeknisi" => 3031,
        "idServis" => $this->input->post('idServis', true),
        "jamMulai" => $now,
        "jamSelesai" => NULL
    	);

    	$this->db->insert('servisteknisi', $data);
	}
}

/* End of file M_servisteknisi.php */
/* Location: ./application/models/M_servisteknisi.php */