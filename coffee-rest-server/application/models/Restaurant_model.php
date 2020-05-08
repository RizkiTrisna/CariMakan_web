<?php
class Restaurant_model extends CI_Model
{
    public function getRestaurant($id_restaurant = null)
    {
        if ($id_restaurant === null) {
            return $this->db->get('tb_restaurant')->result_array();
        } else {
            return $this->db->get_where('tb_restaurant', ['id_restaurant' => $id_restaurant])->result_array();
        }
    }
    public function deleteRestaurant($id_restaurant)
    {
        $this->db->delete('tb_restaurant', ['id_restaurant' => $id_restaurant]);
        return $this->db->affected_rows();
    }
    public function insertRestaurant($data)
    {
        $this->db->insert('tb_restaurant', $data);
        return $this->db->affected_rows();
    }
    public function updateRestaurant($data, $id_restaurant)
    {
        $this->db->update('tb_restaurant', $data, ['id_restaurant' => $id_restaurant]);
        return $this->db->affected_rows();
    }

    
} 
