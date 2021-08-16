<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{
    public function getAccount($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row();
    }
    public function getRole()
    {
        return $this->db->get('role')->result();
    }

    public function updateaccount()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['nama'],
            'username' => $post['username'],
            'role_id' => $post['role_id'],
            'is_active' => $post['is_active'],
        );
        $id = $this->session->userdata('id');
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function updateimage()
    {
        $id = $this->session->userdata('id');
        array_map('unlink', glob(FCPATH . "assets/upload/user" . $id . ".*"));

        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'user' . $id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data("file_name");
            $this->db->where('id', $id);
            $this->db->update('user', ['foto' => $foto]);
            return true;
        } else {
            return false;
        }
    }
}
    
    /* End of file Account_model.php */
