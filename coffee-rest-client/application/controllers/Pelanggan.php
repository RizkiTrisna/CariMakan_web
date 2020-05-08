<?php

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Review_model');
        $this->load->model('Admin_cafe_model');
        $this->load->model('Status_sewa_model');
        $this->load->model('Level_model');
        $this->load->model('Cafe_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $data['review'] = $this->Review_model->getAllReview();
        $data['cafe'] = $this->Cafe_model->getAllCafe();
        $this->load->view('pelanggan/header', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('pelanggan/footer');

        // $this->load->view('templates/header', $data);
        // $this->load->view('admin/index', $data);
        // $this->load->view('templates/footer');
    }

    public function about()
    {
        $data['judul'] = 'About';

        $this->load->view('pelanggan/header', $data);
        $this->load->view('pelanggan/about');
        $this->load->view('pelanggan/footer');
    }

    //Review=====================================================================================================

    public function adminReview()
    {
        $data['judul'] = 'Konfigurasi Review';
        $data['review'] = $this->Admin_review_model->getAllReview();
        if ($this->input->post('keyword')) {
            $data['review'] = $this->Admin_review_model->findReview();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-review/index', $data);
        $this->load->view('templates/footer');
    }

    public function insertReview()
    {
        $this->Review_model->insertReview();
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('pelanggan');
    }

    public function deleteReview($id)
    {
        $this->Admin_review_model->deleteReview($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/adminReview');
    }

    public function detailReview($id)
    {
        $data['judul'] = 'Form Update Data Review';
        $data['resultReview'] = $this->Admin_review_model->getReviewById($id);
        $data['resultLevel'] = $this->Level_model->getAllLevel();
        $data['resultCafe'] = $this->Cafe_model->getAllCafe();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-review/update', $data);
        $this->load->view('templates/footer');
    }

    
    public function showInsertForm()
    {
        $data['judul'] = 'Form Insert Review';
        $data['resultLevel'] = $this->Level_model->getAllLevel();
        $data['resultCafe'] = $this->Cafe_model->getAllCafe();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-review/insert', $data);
        $this->load->view('templates/footer');
    }

    public function updateReview()
    {
        $data['judul'] = 'Form Update Data Review';
        // $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        $this->form_validation->set_rules('id_review', 'ID Review', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/admin-review/update', $data);
            $this->load->view('templates/footer');
            echo "Gagal";
        } else {
            $status = $this->Admin_review_model->updateReview();
            if ($status['status'] === true) {
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('admin/adminReview');
            } else {
                $this->session->set_flashdata('error', 'Diubah');
                redirect('admin/adminReview');
            }
        }
    }


    //Cafe=====================================================================================================

    public function adminCafe()
    {
        $data['judul'] = 'Review';
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
        // $data['judul'] = 'Form Update Data Review';
        // // $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        // $this->form_validation->set_rules('id_review', 'ID Review', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('admin/admin-review/update', $data);
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
