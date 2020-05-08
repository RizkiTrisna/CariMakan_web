<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Restaurant extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Restaurant_model', 'restaurant');
    }

    public function index_get()
    {
        $id_restaurant = $this->get('id_restaurant');

        if ($id_restaurant === null) {
            $restaurant = $this->restaurant->getRestaurant();
        } else {
            $restaurant = $this->restaurant->getRestaurant($id_restaurant);
        }
        // var_dump($restaurant);
        // if ($restaurant) {
        //     $this->response([
        //         'status' => True,
        //         'data' =>  [
        //             'id_restaurant' => $restaurant[]['id_restaurant'],
        //             'nm_restaurant' => $restaurant['nm_restaurant'],
        //             'fasilitas' => $restaurant['fasilitas'],
        //             'daftar_menu' => $restaurant['daftar_menu'],
        //             'jam_buka' => $restaurant['jam_buka'],
        //             'jam_tutup' => $restaurant['jam_tutup'],
        //             'alamat' => $restaurant['alamat'],
        //             'no_wa' => $restaurant['no_wa'],
        //             'kursi_sisa' => $restaurant['kursi_sisa'],
        //             'kursi_max' => $restaurant['kursi_max'],
        //             'id_status_sewa' => $restaurant['id_status_sewa'],
        //             'harga_sewa_per_kursi' => $restaurant['harga_sewa_per_kursi'],
        //             'harga_sewa_restaurant' => $restaurant['harga_sewa_restaurant'],
        //             'gambar' => $restaurant['id_restaurant'],
        //             'img_link' => base_url() . 'upload/product/' . $restaurant['id_restaurant']

        //         ]
        //     ], REST_Controller::HTTP_OK);
        // } else {
            // $restaurant += ['img_link' => base_url() . 'upload/product/' . $restaurant['id_restaurant']];
        if ($restaurant) {
            $this->response([
                'status' => True,
                'data' =>  $restaurant
            ], REST_Controller::HTTP_OK);
        } else {
            // if ($restaurant) {
            //     $this->response([
            //         'status' => True,
            //         'data' =>  $restaurant
            //     ], REST_Controller::HTTP_OK);
            // } else {
            $this->response([
                'status' => False,
                'message' => $restaurant
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id_restaurant = $this->delete('id_restaurant');

        if ($id_restaurant === null) {
            $this->response([
                'status' => false,
                'message' => 'Field ID kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->restaurant->deleteRestaurant($id_restaurant) > 0) {
                //Sukses
                $this->response([
                    'status' => true,
                    'id_restaurant' => $id_restaurant,
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
        $id_restaurant = $this->put('id_restaurant');

        $data = [
            'nm_restaurant' => $this->put('nm_restaurant'),
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
            'harga_sewa_restaurant' => $this->put('harga_sewa_restaurant'),
            'gambar' => $this->put('gambar')
        ];

        if ($this->restaurant->updateRestaurant($data, $id_restaurant) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Restaurant Berhasil Diupdate'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Restaurant Gagal Diupdate'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        // if ($this->post('gambar') == null) {
        //     $data = [
        //         'id_restaurant' => $this->post('id_restaurant'),
        //         'nm_restaurant' => $this->post('nm_restaurant'),
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
        //         'harga_sewa_restaurant' => $this->post('harga_sewa_restaurant'),
        //     ];
        // } else {
        $data = [
            'id_restaurant' => $this->post('id_restaurant'),
            'nm_restaurant' => $this->post('nm_restaurant'),
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
            'harga_sewa_restaurant' => $this->post('harga_sewa_restaurant'),
            'gambar' => $this->post('gambar')
        ];
        // }

        if ($this->restaurant->insertRestaurant($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Restaurant Berhasil Ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'messaga' => 'Data Restaurant Gagal Ditambahkan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
