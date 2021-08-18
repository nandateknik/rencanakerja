<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
        $this->load->library('form_validation');
    }

    public function danger($title, $text)
    {
        $data = '
        <script>
        swal({
            title: "' . $title . '",
            text: "' . $text . '",
            icon: "warning",
            dangerMode: true,
          })          
        </script>';
        $this->session->set_userdata('pesan', $data);
    }

    public function success($title, $text)
    {
        $data = '
        <script>
        swal({
            title: "' . $title . '",
            text: "' . $text . '!",
            icon: "success",
            button: "Confirm",
        });
        </script>';
        $this->session->set_userdata('pesan', $data);
    }


    public function index()
    {

        $id = $this->session->userdata('id');
        $data['account'] = $this->account_model->getAccount($id);
        $data['role'] = $this->account_model->getRole();
        $this->load->view('account', $data);
    }

    public function update_account()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run()) {
            $this->account_model->updateaccount();
            $this->success('Berhasil !', 'Kamu sudah update data account kamu');
        }

        redirect(base_url('account'));
    }

    public function Update_foto()
    {
        if (!empty($_FILES['foto'])) {
            if ($this->account_model->updateimage()) {
                $this->success('Berhasil!', 'Foto Perusahaan kamu berhasil diperbarui');
            } else {
                $this->danger('Gagal!', 'Coba perikas kembali format file kamu');
            }
        }
        redirect(base_url('account'));
    }

    public function update_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run()) {
            if ($this->account_model->updatepw()) {
                $this->success('Berhasil !', 'Kamu berhasil update password');
            } else {
                $this->danger('Gagal !', 'Gagal update password');
            }
        }

        redirect(base_url('account'));
    }
}
    
    /* End of file Account.php */
