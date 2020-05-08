<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Status extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Status_sewa_model', 'status_sewa');
    }

    public function index_get()
    {
        $id_status = $this->get('id_status');

        if ($id_status === null) {
            $status = $this->status_sewa->getStatus();
        } else {
            $status = $this->status_sewa->getStatus($id_status);
        }

        if ($status) {
            $this->response([
                'status' => True,
                'data' => $status
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => False,
                'message' => $status
            ], REST_Controller::HTTP_NOT_FOUND); 
        } 

    }

    public function index_delete(){
        $id_status = $this->delete('id_status');
        
        if ($id_status === null) {
            $this->response([
                'status' => false,
                'message' => 'Field ID kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->status_sewa->deleteStatus($id_status) > 0) {
                //Sukses
                $this->response([
                    'status' => true,
                    'id_status' => $id_status,
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
        $id_status = $this->put('id_status');

        $data = [
            'nm_status' => $this->put('nm_status')
        ];

        if ($this->status_sewa->updateStatus ($data, $id_status) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Status Berhasil Diupdate'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'messaga' => 'Data Status Gagal Diupdate'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post(){

        $data = [
            'id_status'=> $this->post('id_status'),
            'nm_status' => $this->post('nm_status')
        ];
        if ($this->status_sewa->insertStatus($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Status Berhasil Ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Status Gagal Ditambahkan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
