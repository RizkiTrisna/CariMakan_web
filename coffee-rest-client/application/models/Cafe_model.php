<?php

use GuzzleHttp\Client;

class Cafe_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/coffee-rest-server/api/'
        ]);
    }

    
    public function getAllCafe()
    {
        $response = $this->_client->request('GET', 'cafe', ['query' => ['rzk-key' => 'iniadalahkey']]);

        $result = json_decode($response->getBody()->getContents(), true);
       
        return $result;
    }
    // public function getCafe($id_cafe = null)
    // {
    //     if ($id_cafe === null) {
    //         return $this->db->get('tb_cafe')->result_array();
    //     } else {
    //         return $this->db->get_where('tb_cafe', ['id_cafe' => $id_cafe])->result_array();
    //     }
    // }
    // public function deleteCafe($id_cafe)
    // {
    //     $this->db->delete('tb_cafe', ['id_cafe' => $id_cafe]);
    //     return $this->db->affected_rows();
    // }
    // public function insertCafe($data)
    // {
    //     $this->db->insert('tb_cafe', $data);
    //     return $this->db->affected_rows();
    // }
    // public function updateCafe($data, $id_cafe)
    // {
    //     $this->db->update('tb_cafe', $data, ['id_cafe' => $id_cafe]);
    //     return $this->db->affected_rows();
    // }
} 
