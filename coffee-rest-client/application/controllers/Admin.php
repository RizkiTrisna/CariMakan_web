<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_user_model');
        $this->load->model('Admin_cafe_model');
        $this->load->model('Status_sewa_model');
        $this->load->model('Level_model');
        $this->load->model('Cafe_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Konfigurasi User';
        $data['user'] = $this->Admin_user_model->getAllUser();
        if ($this->input->post('keyword')) {
            $data['user'] = $this->Admin_user_model->findUser();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    //User=====================================================================================================

    public function adminUser()
    {
        $data['judul'] = 'Konfigurasi User';
        $data['user'] = $this->Admin_user_model->getAllUser();
        if ($this->input->post('keyword')) {
            $data['user'] = $this->Admin_user_model->findUser();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-user/index', $data);
        $this->load->view('templates/footer');
    }

    public function insertUser()
    {
        $data['judul'] = 'Form Tambah Data User';

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Form Insert User';
            $data['resultLevel'] = $this->Level_model->getAllLevel();
            $data['resultCafe'] = $this->Cafe_model->getAllCafe();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/admin-user/insert', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_user_model->insertUser();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/adminUser');
        }
    }

    public function deleteUser($id)
    {
        $this->Admin_user_model->deleteUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/adminUser');
    }

    public function detailUser($id)
    {
        $data['judul'] = 'Form Update Data User';
        $data['resultUser'] = $this->Admin_user_model->getUserById($id);
        $data['resultLevel'] = $this->Level_model->getAllLevel();
        $data['resultCafe'] = $this->Cafe_model->getAllCafe();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-user/update', $data);
        $this->load->view('templates/footer');
    }

    public function showInsertForm()
    {
        $data['judul'] = 'Form Insert User';
        $data['resultLevel'] = $this->Level_model->getAllLevel();
        $data['resultCafe'] = $this->Cafe_model->getAllCafe();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-user/insert', $data);
        $this->load->view('templates/footer');
    }

    public function updateUser()
    {
        $data['judul'] = 'Form Update Data User';
        // $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/admin-user/update', $data);
            $this->load->view('templates/footer');
            echo "Gagal";
        } else {
            $status = $this->Admin_user_model->updateUser();
            if ($status['status'] === true) {
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('admin/adminUser');
            } else {
                $this->session->set_flashdata('error', 'Diubah');
                redirect('admin/adminUser');
            }
        }
    }

    //Cafe=====================================================================================================
    
    public function adminCafe()
    {
        $data['judul'] = 'Konfigurasi User';
        $data['cafe'] = $this->Admin_cafe_model->getAllCafe();
        $data['sewa'] = $this->Status_sewa_model->getAllStatus();
        if ($this->input->post('keyword')) {
            $data['cafe'] = $this->Admin_cafe_model->findCafe();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-cafe/index', $data);
    $this->load->view('templates/footer');
    }

    public function insertCafe()
    {
        // $data['judul'] = 'Form Tambah Data Cafe';

        // if ($this->form_validation->run() == false) {
        //     $data['judul'] = 'Form Insert Cafe';
        //     $data['resultStatus'] = $this->Status_sewa_model->getAllStatus();

        //     $this->load->view('templates/header', $data);
        //     $this->load->view('admin/admin-cafe/insert', $data);
        //     $this->load->view('templates/footer');
        //     echo "Failed";
        // } else {
            $this->Admin_cafe_model->insertCafe();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/adminCafe');
            echo "Success";
        // }
    }

    public function deleteCafe($id)
    {
        $this->Admin_cafe_model->deleteCafe($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/adminCafe');
    }

    public function detailCafe($id)
    {
        $data['judul'] = 'Form Update Data Cafe';
        $data['resultCafe'] = $this->Admin_cafe_model->getCafeById($id);
        $data['resultStatus'] = $this->Status_sewa_model->getAllStatus();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-cafe/update', $data);
        $this->load->view('templates/footer');
    }

    public function showInsertCafeForm()
    {
        $data['judul'] = 'Form Insert Cafe';
        $data['resultStatus'] = $this->Status_sewa_model->getAllStatus();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-cafe/insert', $data);
        $this->load->view('templates/footer');
    }

    public function updateCafe()
    {
        // $data['judul'] = 'Form Update Data User';
        // // $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        // $this->form_validation->set_rules('id_user', 'ID User', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('admin/admin-user/update', $data);
        //     $this->load->view('templates/footer');
        //     echo "Gagal";
        // } else {
            $status = $this->Admin_cafe_model->updateCafe();
            if ($status['status'] === true) {
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('admin/adminCafe');
            } else {
                $this->session->set_flashdata('error', 'Diubah');
                redirect('admin/adminCafe');
            }
        // }
    }
}
