<?php
class User_model extends CI_Model
{
    public function getUser($id_user = null)
    {

        if ($id_user === null) {
            return $this->db->get('tb_user')->result_array();
        } else {
            return $this->db->get_where('tb_user', ['id_user' => $id_user])->result_array();
        }
    }
    public function getUserByEmail($email = null)
    {
        if ($email === null) {
            return null;
        } else {
            return $this->db->get_where('tb_user', ['email' => $email])->result_array();
        }
    }

    public function deleteUser($id_user)
    {
        $this->db->delete('tb_user', ['id_user' => $id_user]);
        return $this->db->affected_rows();
    }

    public function insertUser($data)
    {
        $this->db->insert('tb_user', $data);
        return $this->db->affected_rows();
    }

    public function updateUser($data, $id_user)
    {
        $this->db->update('tb_user', $data, ['id_user' => $id_user]);
        return $this->db->affected_rows();
    }
}
