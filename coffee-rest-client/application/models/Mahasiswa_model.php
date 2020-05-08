<?php

use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/API-Taufiq/restserver/api/',
            'auth' => ['admin', '1234']
        ]);
    }



    public function getAllMahasiswa()
    {


        $response = $this->_client->request('GET', 'mahasiswa', []);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nim" => $this->input->post('nim', true),
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)

        ];

        $response = $this->_client->request('POST', 'mahasiswa', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function hapusDataMahasiswa($id)
    {
        $response = $this->_client->request('DELETE', 'mahasiswa', [
            'form_params' => [
                'id'  => $id

            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getMahasiswaById($id)
    {


        $response = $this->_client->request('GET', 'mahasiswa', [

            'query' => [
                'id' => $id

            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            "id" => $this->input->post('nim', true),
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)

        ];

        $response = $this->_client->request('PUT', 'mahasiswa', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('tb_mhs')->result_array();
    }
}
