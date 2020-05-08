<?php

use GuzzleHttp\Client;

class Admin_cafe_model extends CI_model
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

    public function insertCafe()
    {
        $data = [
            "id_cafe" => $this->input->post('id_cafe', true),
            "nm_cafe" => $this->input->post('nm_cafe', true),
            "fasilitas" => $this->input->post('fasilitas', true),
            "daftar_menu" => $this->input->post('daftar_menu', true),
            "jam_buka" => $this->input->post('jam_buka', true),
            "jam_tutup" => $this->input->post('jam_tutup', true),
            "alamat" => $this->input->post('alamat', true),
            "no_wa" => $this->input->post('no_wa', true),
            "kursi_sisa" => $this->input->post('kursi_sisa', true),
            "kursi_max" => $this->input->post('kursi_max', true),
            "id_status_sewa" => $this->input->post('id_status_sewa', true),
            "harga_sewa_per_kursi" => $this->input->post('harga_sewa_per_kursi', true),
            "harga_sewa_cafe" => $this->input->post('harga_sewa_cafe', true),
            "gambar" => $this->input->post('gambar', true),
            'rzk-key' => 'iniadalahkey'
        ];
        var_dump($data);
        $response = $this->_client->request('POST', 'cafe', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function deleteCafe($id_cafe)
    {
        $response = $this->_client->request('DELETE', 'cafe', [
            'form_params' => [
                'id_cafe'  => $id_cafe,
                'rzk-key' => 'iniadalahkey'
            ]

        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getCafeById($id)
    {


        $response = $this->_client->request('GET', 'cafe', [

            'query' => [
                'id_cafe' => $id,
                'rzk-key' => 'iniadalahkey'

            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function updateCafe()
    {
        $data = [
            "id_cafe" => $this->input->post('id_cafe', true),
            "nm_cafe" => $this->input->post('nm_cafe', true),
            "fasilitas" => $this->input->post('fasilitas', true),
            "daftar_menu" => $this->input->post('daftar_menu', true),
            "jam_buka" => $this->input->post('jam_buka', true),
            "jam_tutup" => $this->input->post('jam_tutup', true),
            "alamat" => $this->input->post('alamat', true),
            "no_wa" => $this->input->post('no_wa', true),
            "kursi_sisa" => $this->input->post('kursi_sisa', true),
            "kursi_max" => $this->input->post('kursi_max', true),
            "id_status_sewa" => $this->input->post('id_status_sewa', true),
            "harga_sewa_per_kursi" => $this->input->post('harga_sewa_per_kursi', true),
            "harga_sewa_cafe" => $this->input->post('harga_sewa_cafe', true),
            "gambar" => $this->input->post('gambar', true)
        ];

        $response = $this->_client->request('PUT', 'cafe', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function findUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_cafe', $keyword);
        // $this->db->or_like('jurusan', $keyword);
        // $this->db->or_like('nim', $keyword);
        // $this->db->or_like('email', $keyword);
        return $this->db->get('tb_cafe')->result_array();
    }
}
