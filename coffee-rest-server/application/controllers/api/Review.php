<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Review extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Review_model', 'review');
    }

    public function index_get()
    {
        $id_review = $this->get('id_review');

        if ($id_review === null) {
            $review = $this->review->getReview();
        } else {
            $review = $this->review->getReview($id_review);
        }
        // var_dump($review);
        // if ($review) {
        //     $this->response([
        //         'status' => True,
        //         'data' =>  [
        //             'id_review' => $review[]['id_review'],
        //             'nm_review' => $review['nm_review'],
        //             'fasilitas' => $review['fasilitas'],
        //             'daftar_menu' => $review['daftar_menu'],
        //             'jam_buka' => $review['jam_buka'],
        //             'jam_tutup' => $review['jam_tutup'],
        //             'alamat' => $review['alamat'],
        //             'no_wa' => $review['no_wa'],
        //             'kursi_sisa' => $review['kursi_sisa'],
        //             'kursi_max' => $review['kursi_max'],
        //             'id_status_sewa' => $review['id_status_sewa'],
        //             'harga_sewa_per_kursi' => $review['harga_sewa_per_kursi'],
        //             'harga_sewa_review' => $review['harga_sewa_review'],
        //             'gambar' => $review['id_review'],
        //             'img_link' => base_url() . 'upload/product/' . $review['id_review']

        //         ]
        //     ], REST_Controller::HTTP_OK);
        // } else {
            // $review += ['img_link' => base_url() . 'upload/product/' . $review['id_review']];
        if ($review) {
            $this->response([
                'status' => True,
                'data' =>  $review
            ], REST_Controller::HTTP_OK);
        } else {
            // if ($review) {
            //     $this->response([
            //         'status' => True,
            //         'data' =>  $review
            //     ], REST_Controller::HTTP_OK);
            // } else {
            $this->response([
                'status' => False,
                'message' => $review
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id_review = $this->delete('id_review');

        if ($id_review === null) {
            $this->response([
                'status' => false,
                'message' => 'Field ID kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->review->deleteReview($id_review) > 0) {
                //Sukses
                $this->response([
                    'status' => true,
                    'id_review' => $id_review,
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
        $id_review = $this->put('id_review');

        $data = [
            'id_cafe' => $this->put('id_cafe'),
            'nama' => $this->put('nama'),
            'judul' => $this->put('judul'),
            'review' => $this->put('review')
        ];

        if ($this->review->updateReview($data, $id_review) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Review Berhasil Diupdate'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Review Gagal Diupdate'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        // if ($this->post('gambar') == null) {
        //     $data = [
        //         'id_review' => $this->post('id_review'),
        //         'nm_review' => $this->post('nm_review'),
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
        //         'harga_sewa_review' => $this->post('harga_sewa_review'),
        //     ];
        // } else {
        $data = [
            'id_review' => $this->post('id_review'),
            'id_cafe' => $this->post('id_cafe'),
            'nama' => $this->post('nama'),
            'judul' => $this->post('judul'),
            'review' => $this->post('review')
        ];
        // }

        if ($this->review->insertReview($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Review Berhasil Ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'messaga' => 'Data Review Gagal Ditambahkan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
