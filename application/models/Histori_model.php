<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Histori_model extends CI_Model
{
    public function insertLog($keterangan)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'tanggal' => date('Y/m/d'),
            'jam' => date('H:i'),
            'id_user' => $id,
            'Keterangan' => $keterangan
        );
        $this->db->insert('log', $data);
    }

    public function getLog()
    {
        $query = $this->db->select('log.keterangan,log.tanggal,log.jam,user.foto,user.nama')
            ->from('log')
            ->join('user', 'user.id = log.id_user')
            ->get();
        return $query->result();
    }

    public function getDivisi()
    {
        return $this->db->get('divisi')->result();
    }

    public function getMission()
    {
        $query = $this->db->select('*')
            ->from('mission')
            ->where('status !=', 'selesai')
            ->where('tanggal <', date('Y/m/d'))
            ->get();
        return $query->result();
    }
}
    
    /* End of file Log_model.php */
