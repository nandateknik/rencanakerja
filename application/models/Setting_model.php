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
}
    
    /* End of file Setting_model.php */
