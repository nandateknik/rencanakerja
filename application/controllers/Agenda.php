<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('agenda_model');
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

    public function index()
    {
        $role = $this->session->userdata('role');

        if ($role == 1) {
            $data['agenda'] = $this->agenda_model->getMission();
        } elseif ($role == 2) {
            $data['agenda'] = $this->agenda_model->getMissionByDivisi();
        } else {
            $data['agenda'] = $this->agenda_model->getMissionByUser();
        }

        $this->load->view('agenda/show', $data);
    }

    public function agendaSelesai($id)
    {
        $this->agenda_model->insertSelesai($id);
        $this->success('Berhasil !', 'Tambah Progress baru');
        redirect(base_url('agenda'));
    }

    public function progres($id)
    {
        $data['mission'] = $this->agenda_model->getMissionById($id);
        $data['progres'] = $this->agenda_model->getProgres($id);
        $this->load->view('agenda/progres', $data);
    }

    public function insert_progres($id = null)
    {
        $this->form_validation->set_rules('progres', 'Progres', 'required');
        if ($this->form_validation->run()) {
            $this->agenda_model->insertProgres($id);
            $this->histori_model->insertLog('Menambah kemajuan kerja');
            $this->success('Berhasil !', 'Tambah Progress baru');
        }

        redirect(base_url('agenda/progres/') . $id);
    }
}
    
    /* End of file Agenda.php */
