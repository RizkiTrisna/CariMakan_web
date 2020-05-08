<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Cafe extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cafe_model', 'cafe');
    }

    public function index_get()
    {
        $id_cafe = $this->get('id_cafe');

        if ($id_cafe === null) {
            $cafe = $this->cafe->getCafe();
        } else {
            $cafe = $this->cafe->getCafe($id_cafe);
        }
        // var_dump($cafe);
        // if ($cafe) {
        //     $this->response([
        //         'status' => True,
        //         'data' =>  [
        //             'id_cafe' => $cafe[]['id_cafe'],
        //             'nm_cafe' => $cafe['nm_cafe'],
        //             'fasilitas' => $cafe['fasilitas'],
        //             'daftar_menu' => $cafe['daftar_menu'],
        //             'jam_buka' => $cafe['jam_buka'],
        //             'jam_tutup' => $cafe['jam_tutup'],
        //             'alamat' => $cafe['alamat'],
        //             'no_wa' => $cafe['no_wa'],
        //             'kursi_sisa' => $cafe['kursi_sisa'],
        //             'kursi_max' => $cafe['kursi_max'],
        //             'id_status_sewa' => $cafe['id_status_sewa'],
        //             'harga_sewa_per_kursi' => $cafe['harga_sewa_per_kursi'],
        //             'harga_sewa_cafe' => $cafe['harga_sewa_cafe'],
        //             'gambar' => $cafe['id_cafe'],
        //             'img_link' => base_url() . 'upload/product/' . $cafe['id_cafe']

        //         ]
        //     ], REST_Controller::HTTP_OK);
        // } else {
            // $cafe += ['img_link' => base_url() . 'upload/product/' . $cafe['id_cafe']];
        if ($cafe) {
            $this->response([
                'status' => True,
                'data' =>  $cafe
            ], REST_Controller::HTTP_OK);
        } else {
            // if ($cafe) {
            //     $this->response([
            //         'status' => True,
            //         'data' =>  $cafe
            //     ], REST_Controller::HTTP_OK);
            // } else {
            $this->response([
                'status' => False,
                'message' => $cafe
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id_cafe = $this->delete('id_cafe');

        if ($id_cafe === null) {
            $this->response([
                'status' => false,
                'message' => 'Field ID kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->cafe->deleteCafe($id_cafe) > 0) {
                //Sukses
                $this->response([
                    'status' => true,
                    'id_cafe' => $id_cafe,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'ID tidak dapat ditemukan'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_put()
    {
        $id_cafe = $this->put('id_cafe');

        $data = [
            'nm_cafe' => $this->put('nm_cafe'),
            'fasilitas' => $this->put('fasilitas'),
            'daftar_menu' => $this->put('daftar_menu'),
            'jam_buka' => $this->put('jam_buka'),
            'jam_tutup' => $this->put('jam_tutup'),
            'alamat' => $this->put('alamat'),
            'no_wa' => $this->put('no_wa'),
            'kursi_sisa' => $this->put('kursi_sisa'),
            'kursi_max' => $this->put('kursi_max'),
            'id_status_sewa' => $this->put('id_status_sewa'),
            'harga_sewa_per_kursi' => $this->put('harga_sewa_per_kursi'),
            'harga_sewa_cafe' => $this->put('harga_sewa_cafe'),
            'gambar' => $this->put('gambar')
        ];

        if ($this->cafe->updateCafe($data, $id_cafe) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Cafe Berhasil Diupdate'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Cafe Gagal Diupdate'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        // if ($this->post('gambar') == null) {
        //     $data = [
        //         'id_cafe' => $this->post('id_cafe'),
        //         'nm_cafe' => $this->post('nm_cafe'),
        //         'fasilitas' => $this->post('fasilitas'),
        //         'daftar_menu' => $this->post('daftar_menu'),
        //         'jam_buka' => $this->post('jam_buka'),
        //         'jam_tutup' => $this->post('jam_tutup'),
        //         'alamat' => $this->post('alamat'),
        //         'no_wa' => $this->post('no_wa'),
        //         'kursi_sisa' => $this->post('kursi_sisa'),
        //         'kursi_max' => $this->post('kursi_max'),
        //         'id_status_sewa' => $this->post('id_status_sewa'),
        //         'harga_sewa_per_kursi' => $this->post('harga_sewa_per_kursi'),
        //         'harga_sewa_cafe' => $this->post('harga_sewa_cafe'),
        //     ];
        // } else {
        $data = [
            'id_cafe' => $this->post('id_cafe'),
            'nm_cafe' => $this->post('nm_cafe'),
            'fasilitas' => $this->post('fasilitas'),
            'daftar_menu' => $this->post('daftar_menu'),
            'jam_buka' => $this->post('jam_buka'),
            'jam_tutup' => $this->post('jam_tutup'),
            'alamat' => $this->post('alamat'),
            'no_wa' => $this->post('no_wa'),
            'kursi_sisa' => $this->post('kursi_sisa'),
            'kursi_max' => $this->post('kursi_max'),
            'id_status_sewa' => $this->post('id_status_sewa'),
            'harga_sewa_per_kursi' => $this->post('harga_sewa_per_kursi'),
            'harga_sewa_cafe' => $this->post('harga_sewa_cafe'),
            'gambar' => $this->post('gambar')
        ];
        // }

        if ($this->cafe->insertCafe($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Cafe Berhasil Ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'messaga' => 'Data Cafe Gagal Ditambahkan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
