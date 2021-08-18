<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mission extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mission_model');
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
    }

    public function tambah()
    {
        $this->form_validation->set_rules('mission', 'mission', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('prioritas', 'prioritas', 'required');

        if ($this->form_validation->run()) {
            $this->mission_model->insert();
            $this->success('Berhasil!', 'Berhasil menambah mission baru');
        }

        $this->load->view('mission/tambah');
    }
}
    
    /* End of file Mission.php */
