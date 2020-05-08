<?php

use GuzzleHttp\Client;

class Review_model extends CI_model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/coffee-rest-server/api/'
        ]);
    }



    public function getAllReview()
    {
        $response = $this->_client->request('GET', 'review', ['query' => ['rzk-key' => 'iniadalahkey']]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function insertReview()
    {
        $data = [
            'id_cafe' => $this->input->post('id_cafe'),
            'nama' => $this->input->post('nama'),
            'judul' => $this->input->post('judul'),
            'review' => $this->input->post('review'),
            'rzk-key' => 'iniadalahkey'
        ];
        var_dump($data);
        $response = $this->_client->request('POST', 'review', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function deleteReview($id_review)
    {
        $response = $this->_client->request('DELETE', 'review', [
            'form_params' => [
                'id_review'  => $id_review,
                'rzk-key' => 'iniadalahkey'
            ]

        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getReviewById($id)
    {


        $response = $this->_client->request('GET', 'review', [

            'query' => [
                'id_review' => $id,
                'rzk-key' => 'iniadalahkey'

            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function updateReview()
    {
        $data = [
            'id_cafe' => $this->input->put('id_cafe'),
            'nama' => $this->input->put('nama'),
            'judul' => $this->input->put('judul'),
            'review' => $this->input->put('review')
        ];


        $response = $this->_client->request('PUT', 'review', [
            'form_params' => $data,
            'rzk-key' => 'iniadalahkey'
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function findUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_review', $keyword);
        // $this->db->or_like('jurusan', $keyword);
        // $this->db->or_like('nim', $keyword);
        // $this->db->or_like('email', $keyword);
        return $this->db->get('tb_review')->result_array();
    }
}
