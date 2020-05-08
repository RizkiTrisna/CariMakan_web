<?php

use GuzzleHttp\Client;

class Level_model extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/coffee-rest-server/api/'
        ]);
    }

    
    public function getAllLevel()
    {
        $response = $this->_client->request('GET', 'level', []);

        $result = json_decode($response->getBody()->getContents(), true);
       
        return $result;
    }

    // public function getLevel($id_level = null)
    // {
    //     if ($id_level === null) {
    //         return $this->db->get('tb_level')->result_array();
    //     } else {
    //         return $this->db->get_where('tb_level', ['id_level' => $id_level])->result_array();
    //     }
    // }
    // public function deleteLevel($id_level)
    // {
    //     $this->db->delete('tb_level', ['id_level' => $id_level]);
    //     return $this->db->affected_rows();
    // }
    // public function insertLevel($data)
    // {
    //     $this->db->insert('tb_level', $data);
    //     return $this->db->affected_rows();
    // }
    // public function updateLevel($data, $id_level)
    // {
    //     $this->db->update('tb_level', $data, ['id_level' => $id_level]);
    //     return $this->db->affected_rows();
    // }
}
