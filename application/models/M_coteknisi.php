<?php

class m_coteknisi extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('coteknisi')->result_array();
    }

    public function autoId()
    {
        $this->db->select("MAX(idCoTeknisi)+1 AS idCoTeknisi");
        $this->db->from("coteknisi");
        $query = $this->db->get();

        return $query->row();
    }

    public function tambahData()
    {
        $data = array(
            "idCoTeknisi" => $this->input->post('id', true),
            "namaCoTeknisi" => $this->input->post('nama', true),
        );

        $this->db->insert('coteknisi', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('idCoTeknisi', $id);
        $this->db->delete('coteknisi');
    }

    public function getById($id)
    {
        return $this->db->get_where('coteknisi', ['idCoTeknisi' => $id])->row_array();
    }

    public function ubahData()
    {
        $data = array(
            "idCoTeknisi" => $this->input->post('id', true),
            "namaCoTeknisi" => $this->input->post('nama', true),
        );

        $this->db->where('idCoTeknisi', $this->input->post('id'));
        $this->db->update('coteknisi', $data);
    }
}
