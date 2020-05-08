<?php

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Cafe_model');
        $this->load->model('Restaurant_model');
        $this->load->model('Status_sewa_model');
        $this->load->model('Level_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $data['cafe'] = $this->Cafe_model->getCafe();
        $data['sewa'] = $this->Status_sewa_model->getStatus();
        $this->load->view('pelanggan/header', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('pelanggan/footer');
    }

    //Cafe=====================================================================================================

    public function listCafe()
    {
        $data['judul'] = 'Daftar Cafe';
        $data['cafe'] = $this->Cafe_model->getCafe();
        $data['sewa'] = $this->Status_sewa_model->getStatus();
        $this->load->view('pelanggan/cafe/header', $data);
        $this->load->view('pelanggan/cafe/index', $data);
        $this->load->view('pelanggan/cafe/footer');
    }
    public function about()
    {
        $data['judul'] = 'About';
        $this->load->view('pelanggan/cafe/header', $data);
        $this->load->view('pelanggan/cafe/about', $data);
        $this->load->view('pelanggan/cafe/footer');
    }

    public function detailCafe($id)
    {
        $data['judul'] = 'Detail Cafe ';
        $data['cafe'] = $this->Cafe_model->getCafe($id);
        $data['sewa'] = $this->Status_sewa_model->getStatus();
        $this->load->view('pelanggan/cafe/header', $data);
        $this->load->view('pelanggan/cafe/detail', $data);
        $this->load->view('pelanggan/cafe/footer');
    }
    //Cafe=====================================================================================================
    public function listRestaurant()
    {
        $data['judul'] = 'Daftar Restaurant';
        $data['restaurant'] = $this->Restaurant_model->getRestaurant();
        $data['sewa'] = $this->Status_sewa_model->getStatus();
        $this->load->view('pelanggan/restaurant/header', $data);
        $this->load->view('pelanggan/restaurant/index', $data);
        $this->load->view('pelanggan/restaurant/footer');
    }

    public function detailRestaurant($id)
    {
        $data['judul'] = 'Detail Restaurant ';
        $data['restaurant'] = $this->Restaurant_model->getRestaurant($id);
        $data['sewa'] = $this->Status_sewa_model->getStatus();
        $this->load->view('pelanggan/restaurant/header', $data);
        $this->load->view('pelanggan/restaurant/detail', $data);
        $this->load->view('pelanggan/restaurant/footer');
    }
}
