<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_servis extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('servis')->result_array();
    }

    public function autoId()
    {
        $this->db->select("MAX(idServis)+1 AS idServis");
        $this->db->from("servis");
        $query = $this->db->get();

        return $query->row();
    }

    public function tambahData()
    {
        $data = array(
            "idServis" => $this->input->post('id', true),
            "namaServis" => $this->input->post('servis', true),
            "hargaPerJam" => $this->input->post('harga', true),
        );

        $this->db->insert('servis', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('idServis', $id);
        $this->db->delete('servis');
    }

    public function getById($id)
    {
        return $this->db->get_where('servis', ['idServis' => $id])->row_array();
    }

    public function ubahData()
    {
        $data = array(
            "idServis" => $this->input->post('id', true),
            "namaServis" => $this->input->post('servis', true),
            "hargaPerJam" => $this->input->post('harga', true),
        );

        $this->db->where('idServis', $this->input->post('id'));
        $this->db->update('servis', $data);
    }
}
                        
/* End of file m_servis.php */
