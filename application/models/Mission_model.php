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
            'prioritas' => $post['prioritas'],
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i')
        );
        $this->db->insert('mission', $data);
    }
}

/* End of file Mission_model.php */
