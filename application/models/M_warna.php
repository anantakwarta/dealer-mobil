<?php

class m_warna extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('warna')->result_array();
    }

    public function tambahData()
    {
        $data = array(
            "idWarna" => $this->input->post('id', true),
            "warna" => $this->input->post('warna', true),
        );

        $this->db->insert('warna', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('idWarna', $id);
        $this->db->delete('warna');
    }

    public function getById($id)
    {
        return $this->db->get_where('warna', ['idWarna' => $id])->row_array();
    }

    public function ubahData()
    {
        $data = array(
            "idWarna" => $this->input->post('id', true),
            "warna" => $this->input->post('warna', true),
        );

        $this->db->where('idWarna', $this->input->post('id'));
        $this->db->update('warna', $data);
    }
}
