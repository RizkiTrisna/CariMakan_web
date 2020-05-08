<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index_get()
    {
        $id_user = $this->get('id_user');

        if ($id_user === null) {
            $user = $this->user->getUser();
        } else {
            $user = $this->user->getUser($id_user);
        }

        if ($user) {
            $this->response([
                'status' => true,
                'data' => $user
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => $user
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id_user = $this->delete('id_user');

        if ($id_user === null) {
            $this->response([
                'status' => false,
                'message' => 'Field ID kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->user->deleteUser($id_user) > 0) {
                //Sukses
                $this->response([
                    'status' => true,
                    'id_user' => $id_user,
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

    public function index_post()
    {
        $data = [
            'id_user' => $this->post('id_user'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'nohp' => $this->post('nohp'),
            'no_ktp' => $this->post('no_ktp'),
            'alamat' => $this->post('alamat'),
            'id_level' => $this->post('id_level'),
            'id_cafe' => $this->post('id_cafe'),
            'password' => $this->post('password')
        ];

        if ($this->user->insertUser($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data User Berhasil Ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'messaga' => 'Data User Gagal Ditambahkan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id_user = $this->put('id_user');
        $data = [
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'nohp' => $this->put('nohp'),
            'no_ktp' => $this->put('no_ktp'),
            'alamat' => $this->put('alamat'),
            'id_level' => $this->put('id_level'),
            'id_cafe' => $this->put('id_cafe'),
            'password' => $this->put('password')
        ];  

        if ($this->user->updateUser($data, $id_user) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data User Berhasil Diupdate'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data User Gagal Diupdate'
            ], REST_Controller::HTTP_OK);
        }
    }

    
}
