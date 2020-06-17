<?php

class m_mobil extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*')
            ->from('mobil')
            ->join('merk', 'merk.idMerk=mobil.idMerk')
            ->join('warna', 'warna.idWarna=mobil.idWarna');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function autoId()
    {
        $this->db->select("MAX(idMobil)+1 AS idMobil");
        $this->db->from("mobil");
        $query = $this->db->get();

        return $query->row();
    }

    public function tambahData()
    {
        $data = array(
            "idMobil" => $this->input->post('id', true),
            "idMerk" => $this->input->post('merk', true),
            "model" => $this->input->post('model', true),
            "idWarna" => $this->input->post('warna', true),
            "tahun" => $this->input->post('tahun', true),
            "harga" => $this->input->post('harga', true),
            "stok" => $this->input->post('stok', true),
        );

        $this->db->insert('mobil', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('idMobil', $id);
        $this->db->delete('mobil');
    }

    public function getById($id)
    {
        $this->db->select('*')
            ->from('mobil')
            ->join('merk', 'merk.idMerk=mobil.idMerk')
            ->join('warna', 'warna.idWarna=mobil.idWarna');
        $this->db->where('idMobil', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahData()
    {
        $data = array(
            "idMobil" => $this->input->post('id', true),
            "idMerk" => $this->input->post('merk', true),
            "model" => $this->input->post('model', true),
            "idWarna" => $this->input->post('warna', true),
            "tahun" => $this->input->post('tahun', true),
            "harga" => $this->input->post('harga', true),
            "stok" => $this->input->post('stok', true),
        );

        $this->db->where('idMobil', $this->input->post('id'));
        $this->db->update('mobil', $data);
    }
}
