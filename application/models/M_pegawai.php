<?php

class M_pegawai extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('jabatan', 'jabatan.idJabatan=pegawai.idJabatan');
        $this->db->join('user', 'user.username=pegawai.username');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function autoId()
    {
        $this->db->select("MAX(idPegawai)+1 AS idPegawai");
        $this->db->from("pegawai");
        $query = $this->db->get();

        return $query->row();
    }

    public function tambahData()
    {
        $data = array(
            "idPegawai" => $this->input->post('id', true),
            "namaPegawai" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "idJabatan" => $this->input->post('idJabatan', true),
            "alamat" => $this->input->post('alamat', true),
            "noTelp" => $this->input->post('noTelp', true),
        );
        $data2 = array(
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "hakAkses" => '2'
        );

        $this->db->insert('pegawai', $data);
        $this->db->insert('user', $data2);
    }

    public function hapusData($id)
    {
        $query = $this->db->select('username')->from('pegawai')->where('idPegawai', $id)->get();
        $username = $query->row()->username;

        $this->db->where('idPegawai', $id)->delete('pegawai');

        $this->db->where('username', $username)->delete('user');
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('jabatan', 'jabatan.idJabatan=pegawai.idJabatan');
        $this->db->join('user', 'user.username=pegawai.username');
        $this->db->where('idPegawai', $id);
        $query = $this->db->get();
        return $query->row_array();
        //return $this->db->get_where('pegawai', ['idPegawai' => $id])->row_array();
    }

    public function ubahData()
    {
        /*$data = array(
            "idPegawai" => $this->input->post('id', true),
            "namaPegawai" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "idJabatan" => $this->input->post('idJabatan', true),
            "alamat" => $this->input->post('alamat', true),
            "noTelp" => $this->input->post('noTelp', true),
        );*/
        $this->db->set('namaPegawai', $this->input->post('nama', true))
            ->set('username', $this->input->post('username', true))
            ->set('idJabatan', $this->input->post('idJabatan', true))
            ->set('alamat', $this->input->post('alamat', true))
            ->set('noTelp', $this->input->post('noTelp', true))
            ->where('idPegawai', $this->input->post('id'))
            ->update('pegawai');

        //$this->db->where('idPegawai', $this->input->post('id'))->update('pegawai', $data);

        /*$data2 = array(
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "hakAkses" => '2'
        );*/

        $this->db->set('username', $this->input->post('username', true))
            ->set('password', $this->input->post('password', true))
            ->where('username', $this->input->post('username'))
            ->update('user');
        //$this->db->where('username', $this->input->post('username'))->update('user', $data2);
    }
}
