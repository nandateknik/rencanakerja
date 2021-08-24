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
            'id_user' => $post['id_user'],
            'start' => $post['start'],
            'end' => $post['end'],
            'status' => 'baru'
        );
        $this->db->insert('mission', $data);
    }

    public function getUser()
    {
        return $this->db->get_where('user', ['role_id' => 3])->result();
    }

    public function getUserByDivisi()
    {
        $divisi = $this->session->userdata('divisi');
        $this->db->where('divisi', $divisi);
        $this->db->where('role_id', 3);

        return $this->db->get('user')->result();
    }

    public function getByDate()
    {
        $post = $this->input->post();
        $query = $this->db->select('*')
            ->from('mission')
            ->where('start >=', $post['dari'])
            ->where('start <=', $post['hingga'])
            ->get();
        return $query->result();
    }
}

/* End of file Mission_model.php */
