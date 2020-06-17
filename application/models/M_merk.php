<?php

class m_merk extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('merk')->result_array();
    }

    public function autoId()
    {
        $this->db->select("MAX(idMerk)+1 AS idMerk");
        $this->db->from("merk");
        $query = $this->db->get();

        return $query->row();
    }

    public function tambahData()
    {
        $data = array(
            "idMerk" => $this->input->post('id', true),
            "namaMerk" => $this->input->post('merk', true),
        );

        $this->db->insert('merk', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('idMerk', $id);
        $this->db->delete('merk');
    }

    public function getById($id)
    {
        return $this->db->get_where('merk', ['idMerk' => $id])->row_array();
    }

    public function ubahData()
    {
        $data = array(
            "idMerk" => $this->input->post('id', true),
            "namaMerk" => $this->input->post('merk', true),
        );

        $this->db->where('idMerk', $this->input->post('id'));
        $this->db->update('merk', $data);
    }
}
