<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('setting_model');
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

    public function User()
    {
        $data['user'] = $this->setting_model->getUser();
        $this->load->view('setting/user', $data);
    }

    public function ResetPassword($id = null)
    {
        if (!empty($this->setting_model->resetpw($id))) {
            $this->success('Berhasil', 'Kamu berhasil reset password');
        } else {
            $this->danger('Gagal', 'Kamu gagal reset password');
        }
        redirect(base_url('setting/user'));
    }

    public function Perusahaan()
    {
        $data['perusahaan'] = $this->setting_model->getperusahaan();
        $this->load->view('setting/perusahaan', $data);
    }

    public function Update_perusahaan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run()) {
            $this->setting_model->updateperusahaan();
            $this->success('Berhasil !', 'Kamu berhasil mengupdate data perusahaan');
        }
        redirect(base_url('setting/perusahaan'));
    }

    public function Update_foto()
    {
        if (!empty($_FILES['foto'])) {
            if ($this->setting_model->updateimage()) {
                $this->success('Berhasil!', 'Foto Perusahaan kamu berhasil diperbarui');
            } else {
                $this->danger('Gagal!', 'Coba perikas kembali format file kamu');
            }
        }
        redirect(base_url('setting/perusahaan'));
    }

    public function account($id = null)
    {
        $data['account'] = $this->setting_model->getAccount($id);
        $data['role'] = $this->account_model->getRole();
        $this->load->view('account', $data);
    }

    public function aktif($id = null)
    {
        if ($this->setting_model->updatestatus($id, 1)) {
            $this->success('Berhasil!', 'Sudah diaktifkan');
        } else {
            $this->danger('Gagal !', 'Gagal diaktifkan');
        }
        redirect('setting/user');
    }

    public function nonaktif($id = null)
    {
        if ($this->setting_model->updatestatus($id, 0)) {
            $this->success('Berhasil!', 'Sudah diaktifkan');
        } else {
            $this->danger('Gagal !', 'Gagal diaktifkan');
        }
        redirect('setting/user');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'passconf', 'required|matches[password]');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');

        if ($this->form_validation->run()) {
            $this->setting_model->register();
            $this->success('Berhasil!', 'Akun sudah dibuat silahkan login');
        }

        redirect(base_url('setting/user'));
    }
}
    
    /* End of file Setting.php */
