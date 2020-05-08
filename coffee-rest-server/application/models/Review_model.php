<?php
class Review_model extends CI_Model
{
    public function getReview($id_review = null)
    {
        if ($id_review === null) {
            return $this->db->get('tb_review')->result_array();
        } else {
            return $this->db->get_where('tb_review', ['id_review' => $id_review])->result_array();
        }
    }
    public function deleteReview($id_review)
    {
        $this->db->delete('tb_review', ['id_review' => $id_review]);
        return $this->db->affected_rows();
    }
    public function insertReview($data)
    {
        $this->db->insert('tb_review', $data);
        return $this->db->affected_rows();
    }
    public function updateReview($data, $id_review)
    {
        $this->db->update('tb_review', $data, ['id_review' => $id_review]);
        return $this->db->affected_rows();
    }

    
} 
