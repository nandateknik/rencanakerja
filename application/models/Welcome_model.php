<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
    public function login()
    {
        $post = $this->input->post();
        $user = $this->db->get_where('user', ['username' => $post['username']])->row();
        $this->session->set_userdata('login', false);

        if ($user && $user->is_active == 1) {
            if ($user->username == $post['username'] && $user->password == $post['password']) {
                $session = array(
                    'nama' => $user->nama,
                    'id' => $user->id,
                    'divisi' => $user->divisi,
                    'role' => $user->role_id,
                    'login' => true
                );
                $this->session->set_userdata($session);
            }
        }
    }
}
    
    /* End of file Welcome_model.php */
