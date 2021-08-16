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
}
    
    /* End of file Setting.php */
