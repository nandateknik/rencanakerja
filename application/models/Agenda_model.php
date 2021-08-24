<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{


    public function getMission()
    {
        $query = $this->db->select('mission.id,mission.mission,mission.status,mission.start,mission.end,user.nama')
            ->from('mission')
            ->join('user', 'user.id = mission.id_user')
            ->get();
        return $query->result();
    }


    public function getMissionByDivisi()
    {
        $divisi = $this->session->userdata('divisi');

        $query = $this->db->select('mission.id,mission.mission,mission.status,mission.start,mission.end,user.nama')
            ->from('mission')
            ->join('user', 'user.id = mission.id_user')
            ->where('divisi', $divisi)
            ->get();
        return $query->result();
    }

    public function getMissionByUser()
    {
        $id = $this->session->userdata('id');

        $query = $this->db->select('mission.id,mission.mission,mission.status,mission.start,mission.end,user.nama')
            ->from('mission')
            ->join('user', 'user.id = mission.id_user')
            ->where('id_user', $id)
            ->get();
        return $query->result();
    }

    public function getMissionSelesai()
    {
        $this->db->where('status', 'selesai');
        $this->db->order_by('id', 'desc');
        return $this->db->get('mission')->result();
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
            'status' => 'pending',
            'id_mission' => $id,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i'),
            'id_user' => $idUser
        );
        $this->db->insert('progres', $data);
        $this->updateStatusMission($id, 'pending');
    }
    public function updateStatusMission($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('mission', ['status' => $status]);
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

    public function insertSelesai($id)
    {
        $data = array(
            'progres' => 'Selesai Dikerjakan',
            'status' => 'selesai',
            'id_mission' => $id,
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i'),
            'id_user' =>  $this->session->userdata('id')
        );
        $this->db->insert('progres', $data);
        $this->updateStatusMission($id, 'selesai');
    }
}
    
    /* End of file Agenda_model.php */
