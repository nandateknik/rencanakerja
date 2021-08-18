<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('agenda_model');
    }


    public function index()
    {
        $data['agenda'] = $this->agenda_model->getMissionNow();
        $this->load->view('agenda/show', $data);
    }

    public function progres($id)
    {
        # code...
    }
}
    
    /* End of file Agenda.php */
