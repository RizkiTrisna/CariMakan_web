<?php
class Status_sewa_model extends CI_Model
{
    public function getStatus($id_status = null)
    {
        if ($id_status === null) {
            return $this->db->get('tb_status_sewa_cafe')->result_array();
        } else {
            return $this->db->get_where('tb_status_sewa_cafe', ['id_status' => $id_status])->result_array();
        }
    }
    public function deleteStatus($id_status)
    {
        $this->db->delete('tb_status_sewa_cafe', ['id_status' => $id_status]);
        return $this->db->affected_rows();
    }
    public function insertStatus($data)
    {
        $this->db->insert('tb_status_sewa_cafe', $data);
        return $this->db->affected_rows();
    }
    
    public function updateStatus($data, $id_status)
    {
        $this->db->update('tb_status_sewa_cafe', $data, ['id_status' => $id_status]);
        return $this->db->affected_rows();
    }
} 
