<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Level extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Level_model', 'level');
    }

    public function index_get()
    {
        $id_level = $this->get('id_level');

        if ($id_level === null) {
            $level = $this->level->getLevel();
        } else {
            $level = $this->level->getLevel($id_level);
        }

        if ($level) {
            $this->response([
                'status' => True,
                'data' => $level
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => False,
                'message' => $level
            ], REST_Controller::HTTP_NOT_FOUND); 
        } 

    }

    public function index_delete(){
        $id_level = $this->delete('id_level');
        
        if ($id_level === null) {
            $this->response([
                'status' => false,
                'message' => 'Field ID kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->level->deleteLevel($id_level) > 0) {
                //Sukses
                $this->response([
                    'status' => true,
                    'id_level' => $id_level,
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

    public function index_put(){
        $id_level = $this->put('id_level');

        $data = [
            'nm_level' => $this->put('nm_level'),
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
            'harga_sewa_level' => $this->put('harga_sewa_level'),
            'gambar' => $this->put('gambar')
        ];

        if ($this->level->updateLevel ($data, $id_level) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Level Berhasil Diupdate'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'messaga' => 'Data Level Gagal Diupdate'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

    public function index_post(){

        $data = [
            'id_level'=> $this->post('id_level'),
            'nm_level' => $this->post('nm_level'),
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
            'harga_sewa_level' => $this->post('harga_sewa_level'),
            'gambar' => $this->post('gambar')
        ];
        if ($this->level->insertLevel($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Level Berhasil Ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'messaga' => 'Data Level Gagal Ditambahkan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
