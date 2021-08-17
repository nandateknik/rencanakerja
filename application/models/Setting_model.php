<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    public function getperusahaan()
    {
        return $this->db->get_where('perusahaan', ['id' => 1])->row();
    }

    public function updateperusahaan()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['nama'],
            'no_hp' => $post['no_hp'],
            'alamat' => $post['alamat'],
        );
        $this->db->where('id', 1);
        $this->db->update('perusahaan', $data);
    }

    public function updateimage()
    {
        array_map('unlink', glob(FCPATH . "assets/upload/1.*"));

        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 1;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data("file_name");
            $this->db->where('id', 1);
            $this->db->update('perusahaan', ['foto' => $foto]);
            return true;
        } else {
            return false;
        }
    }

    function getUser()
    {
        return $this->db->get('user')->result();
    }

    public function resetpw($id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', ['password' => 'user']);
        return $this->db->affected_rows();
    }

    public function updatepw()
    {
        $id = $this->session->userdata('id');
        $post = $this->input->post();
        $this->db->where('id', $id);
        $this->db->update('user', ['password' => $post['password']]);
        return $this->db->affected_rows();
    }

    public function updatestatus($id, $nilai)
    {
        $this->db->where('id', $id);
        $this->db->update('user', ['is_active' => $nilai]);
        return $this->db->affected_rows();
    }

    public function register()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['nama'],
            'username' => $post['username'],
            'password' => $post['password'],
            'is_active' => 1,
            'role_id' => $post['role_id'],
            'foto' => 'no-image.png'
        );
        $this->db->insert('user', $data);
    }
}
    
    /* End of file Setting_model.php */
