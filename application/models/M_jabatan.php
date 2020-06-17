<?php

class m_jabatan extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('jabatan')->result_array();
    }

    public function tambahData()
    {
        $data = array(
            "idJabatan" => $this->input->post('id', true),
            "jabatan" => $this->input->post('jabatan', true),
        );

        $this->db->insert('jabatan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('idJabatan', $id);
        $this->db->delete('jabatan');
    }

    public function getById($id)
    {
        return $this->db->get_where('jabatan', ['idJabatan' => $id])->row_array();
    }

    public function ubahData()
    {
        $data = array(
            "idJabatan" => $this->input->post('id', true),
            "jabatan" => $this->input->post('jabatan', true),
        );

        $this->db->where('idJabatan', $this->input->post('id'));
        $this->db->update('jabatan', $data);
    }
}
