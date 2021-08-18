<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{
    public function getMissionNow()
    {
        return $this->db->get_where('mission', ['tanggal' => date('Y/m/d')])->result();
    }

    public function missionx()
    {
        $query = "SELECT * FROM mission WHERE status != 'selesai' && tanggal < '" . date('Y/m/d') . "' ";
        return $this->db->query($query)->result();
    }

    public function getMissionById($id)
    {
        return $this->db->get_where('mission', ['id' => $id])->row();
    }

    public function insertProgres($id)
    {
        $post = $this->input->post();
        $idUser = $this->session->userdata('id');

        $data = array(
            'progres' => $post['progres'],
            'status' => $post['status'],
            'id_mission' => $id,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i'),
            'id_user' => $idUser
        );
        $this->db->insert('progres', $data);
    }

    public function getProgres($id)
    {
        $query = $this->db->select('progres.progres,progres.tanggal,progres.jam,progres.status,user.foto,user.nama')
            ->from('progres')
            ->join('user', 'user.id = progres.id_user')
            ->where('id_mission', $id)
            ->get();
        return $query->result();
    }
}
    
    /* End of file Agenda_model.php */
