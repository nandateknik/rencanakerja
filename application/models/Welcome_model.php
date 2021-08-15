<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
    public function login()
    {
        $post = $this->input->post();
        $user = $this->db->get_where('user', ['username' => $post['username']])->row();
        $this->session->set_userdata('login', false);

        if ($user) {
            if ($user->username == $post['username'] && $user->password == $post['password']) {
                $session = array(
                    'nama' => $user->nama,
                    'foto' => $user->foto,
                    'id' => $user->id,
                    'login' => true
                );
                $this->session->set_userdata($session);
            }
        }
    }
}
    
    /* End of file Welcome_model.php */
