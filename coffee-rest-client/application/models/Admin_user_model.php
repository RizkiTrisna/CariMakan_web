<?php

use GuzzleHttp\Client;

class Admin_user_model extends CI_model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/coffee-rest-server/api/'
        ]);
    }



    public function getAllUser()
    {
        $response = $this->_client->request('GET', 'user', [
            'query' => ['rzk-key' => 'iniadalahkey']
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function insertUser()
    {
        if ($this->input->post('id_cafe', true) == 0) {
            $data = [
                "id_user" => $this->input->post('id_user', true),
                "nama" => $this->input->post('nama', true),
                "email" => $this->input->post('email', true),
                "nohp" => $this->input->post('nohp', true),
                "no_ktp" => $this->input->post('no_ktp', true),
                "alamat" => $this->input->post('alamat', true),
                "id_level" => $this->input->post('id_level', true),
                "password" => $this->input->post('password', true)

            ];
        } else {
            $data = [
                "id_user" => $this->input->post('id_user', true),
                "nama" => $this->input->post('nama', true),
                "email" => $this->input->post('email', true),
                "nohp" => $this->input->post('nohp', true),
                "no_ktp" => $this->input->post('no_ktp', true),
                "alamat" => $this->input->post('alamat', true),
                "id_level" => $this->input->post('id_level', true),
                "id_cafe" => $this->input->post('id_cafe', true),
                "password" => $this->input->post('password', true)

            ];
        }
        var_dump($data);
        $response = $this->_client->request('POST', 'user', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function deleteUser($id_user)
    {
        $response = $this->_client->request('DELETE', 'user', [
            'form_params' => [
                'id_user'  => $id_user

            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getUserById($id)
    {


        $response = $this->_client->request('GET', 'user', [

            'query' => [
                'id_user' => $id

            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function updateUser()
    {
        if ($this->input->post('id_cafe', true) == 0) {
            $data = [
                "id_user" => $this->input->post('id_user', true),
                "nama" => $this->input->post('nama', true),
                "email" => $this->input->post('email', true),
                "nohp" => $this->input->post('nohp', true),
                "no_ktp" => $this->input->post('no_ktp', true),
                "alamat" => $this->input->post('alamat', true),
                "id_level" => $this->input->post('id_level', true),
                "password" => $this->input->post('password', true)

            ];
        } else {
            $data = [
                "id_user" => $this->input->post('id_user', true),
                "nama" => $this->input->post('nama', true),
                "email" => $this->input->post('email', true),
                "nohp" => $this->input->post('nohp', true),
                "no_ktp" => $this->input->post('no_ktp', true),
                "alamat" => $this->input->post('alamat', true),
                "id_level" => $this->input->post('id_level', true),
                "id_cafe" => $this->input->post('id_cafe', true),
                "password" => $this->input->post('password', true)

            ];
        }

        $response = $this->_client->request('PUT', 'user', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function findUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_user', $keyword);
        // $this->db->or_like('jurusan', $keyword);
        // $this->db->or_like('nim', $keyword);
        // $this->db->or_like('email', $keyword);
        return $this->db->get('tb_user')->result_array();
    }
}
