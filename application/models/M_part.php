<?php

class m_part extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('part')->result_array();
    }

    public function tambahData()
    {
        $data = array(
            "idPart" => $this->input->post('id', true),
            "namaPart" => $this->input->post('part', true),
            "harga" => $this->input->post('harga', true),
        );

        $this->db->insert('part', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('idPart', $id);
        $this->db->delete('part');
    }

    public function getById($id)
    {
        return $this->db->get_where('part', ['idPart' => $id])->row_array();
    }

    public function ubahData()
    {
        $data = array(
            "idPart" => $this->input->post('id', true),
            "namaPart" => $this->input->post('part', true),
            "harga" => $this->input->post('harga', true),
        );

        $this->db->where('idPart', $this->input->post('id'));
        $this->db->update('part', $data);
    }
}
