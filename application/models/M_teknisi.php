<?php

class m_teknisi extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*')
            ->from('teknisi')
            ->join('coteknisi', 'teknisi.idCoTeknisi=coteknisi.idCoTeknisi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function autoId()
    {
        $this->db->select("MAX(idTeknisi)+1 AS idTeknisi");
        $this->db->from("teknisi");
        $query = $this->db->get();

        return $query->row();
    }

    public function tambahData()
    {
        $data = array(
            "idTeknisi" => $this->input->post('id', true),
            "namaTeknisi" => $this->input->post('nama', true),
            "idCoTeknisi" => $this->input->post('coteknisi', true),
        );

        $this->db->insert('teknisi', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('idTeknisi', $id);
        $this->db->delete('teknisi');
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('teknisi');
        $this->db->join('coteknisi', 'teknisi.idCoTeknisi=coteknisi.idCoTeknisi');
        $this->db->where('idTeknisi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahData()
    {
        $data = array(
            "idTeknisi" => $this->input->post('id', true),
            "namaTeknisi" => $this->input->post('nama', true),
            "idCoTeknisi" => $this->input->post('coteknisi', true),
        );

        $this->db->where('idTeknisi', $this->input->post('id'));
        $this->db->update('teknisi', $data);
    }
}
