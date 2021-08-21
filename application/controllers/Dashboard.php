<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('histori_model');
    }


    public function index()
    {
        $data['log'] = $this->histori_model->getLog();
        $data['divisi'] = $this->histori_model->getDivisi();
        $data['mission'] = $this->histori_model->getMission();
        $this->load->view('dashboard', $data);
    }
}
    
    /* End of file Dashboard.php */
