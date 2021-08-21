<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mission extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mission_model');
        $this->load->library('form_validation');
        $this->load->model('histori_model');
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

    public function data()
    {
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('hingga', 'hingga Tanggal', 'required');

        if ($this->form_validation->run()) {
            $data['data'] = $this->mission_model->getByDate();
            $this->load->view('mission/data', $data);
        }

        $this->load->view('mission/data');
    }

    public function index()
    {
    }

    public function tambah()
    {
        $this->form_validation->set_rules('mission', 'mission', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

        if ($this->form_validation->run()) {
            $this->mission_model->insert();
            $this->histori_model->insertLog('Membuat Missi Baru Cek Now');
            $this->success('Berhasil!', 'Berhasil menambah mission baru');
        }

        $data['divisi'] = $this->mission_model->getDivisi();
        $this->load->view('mission/tambah', $data);
    }
}
    
    /* End of file Mission.php */
