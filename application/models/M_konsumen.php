<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_konsumen extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*')
            ->from('konsumen')
            ->join('user', 'user.username=konsumen.username');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function autoId()
    {
        $this->db->select("MAX(idKons)+1 AS idKons");
        $this->db->from("konsumen");
        $query = $this->db->get();

        return $query->row();
    }

    public function tambahData()
    {
        $data = array(
            "idKons" => $this->input->post('id', true),
            "namaKons" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "alamat" => $this->input->post('alamat', true),
            "noTelp" => $this->input->post('noTelp', true),
            "kota" => $this->input->post('kota', true),
            "provinsi" => $this->input->post('provinsi', true),
            "kodePos" => $this->input->post('kodePos', true),
        );
        $data2 = array(
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "hakAkses" => '3'
        );

        $this->db->insert('konsumen', $data);
        $this->db->insert('user', $data2);
    }

    public function hapusData($id)
    {
        $query = $this->db->select('username')->from('konsumen')->where('idKons', $id)->get();
        $username = $query->row()->username;

        $this->db->where('idKons', $id)->delete('konsumen');

        $this->db->where('username', $username)->delete('user');
    }

    public function getById($id)
    {
        $this->db->select('*')
            ->from('konsumen')
            ->join('user', 'user.username=konsumen.username')
            ->where('idKons', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahData()
    {
        $this->db->set('namaKons', $this->input->post('nama', true))
            ->set('username', $this->input->post('username', true))
            ->set('alamat', $this->input->post('alamat', true))
            ->set('noTelp', $this->input->post('noTelp', true))
            ->set('kota', $this->input->post('kota', true))
            ->set('provinsi', $this->input->post('provinsi', true))
            ->set('kodePos', $this->input->post('kodePos', true))
            ->where('idKons', $this->input->post('id'))
            ->update('konsumen');

        $this->db->set('password', $this->input->post('password', true))
            ->where('username', $this->input->post('username'))
            ->update('user');
    }
}
                        
/* End of file m_konsumen.php */
