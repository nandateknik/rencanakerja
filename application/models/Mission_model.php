<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mission_model extends CI_Model
{
    public function insert()
    {
        $post = $this->input->post();
        $data = array(
            'mission' => $post['mission'],
            'deskripsi' => $post['deskripsi'],
            'divisi' => $post['divisi'],
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i'),
            'status' => 'baru'
        );
        $this->db->insert('mission', $data);
    }

    public function getDivisi()
    {
        return $this->db->get('divisi')->result();
    }

    public function getByDate()
    {
        $post = $this->input->post();
        $query = $this->db->select('*')
            ->from('mission')
            ->where('tanggal >=', $post['dari'])
            ->where('tanggal <=', $post['hingga'])
            ->get();
        return $query->result();
    }
}

/* End of file Mission_model.php */
