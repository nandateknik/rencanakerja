<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{
    public function getMissionNow()
    {
        return $this->db->get_where('mission', ['tanggal' => date('Y/m/d')])->result();
    }
}
    
    /* End of file Agenda_model.php */
