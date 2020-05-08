<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Cafe_model');
        $this->load->model('Status_sewa_model');
        $this->load->model('Level_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        if ($this->session->userdata('status') != "login") {
            $this->load->view('admin/login/index');
        }
    }

    public function index()
    {
        $data['judul'] = 'Konfigurasi User';
        $data['user'] = $this->User_model->getUser();
        if ($this->input->post('keyword')) {
            $data['user'] = $this->User_model->findUser();
        }
    }

    public function cekLogin()
    {
        if ($this->input->post('email', true)) {
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $dataUser = $this->User_model->getUserByEmail($email);
            if ($dataUser != null && $password == $dataUser[0]['password'] && $email == $dataUser[0]['email']) {
                $this->session->set_flashdata('flash', 'Login');
                $data_session = array(
                    'email' => $email,
                    'status' => "login"
                );

                $this->session->set_userdata($data_session);

                echo "hai true" . $this->session->userdata('status');
                redirect('admin/adminUser');
                return true;
            } else {
                $this->session->set_flashdata('error', 'Cocok');
                redirect('admin');
                return false;
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }

    public function dashboard()
    {
        $data['judul'] = 'Konfigurasi User';
        $data['user'] = $this->User_model->getUser();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    //User=====================================================================================================

    public function adminUser()
    {


        if ($this->session->userdata('status') != "login") {
            redirect('admin');
            echo "hai false" . $this->session->userdata('status');
        } else {
            $data['judul'] = 'Konfigurasi User';
            $data['user'] = $this->User_model->getUser();
            if ($this->input->post('keyword')) {
                $data['user'] = $this->User_model->findUser();
            }
            $this->load->view('templates/header', $data);
            $this->load->view('admin/admin-user/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function insertUser()
    {
        $data['judul'] = 'Form Tambah Data User';

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Form Insert User';
            $data['resultLevel'] = $this->Level_model->getLevel();
            $data['resultCafe'] = $this->Cafe_model->getCafe();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/admin-user/insert', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('id_cafe', true) == 0) {
                $dataUser = [
                    "id_user" => $this->input->post('id_user', true),
                    "nama" => $this->input->post('nama', true),
                    "email" => $this->input->post('email', true),
                    "nohp" => $this->input->post('nohp', true),
                    "no_ktp" => $this->input->post('no_ktp', true),
                    "alamat" => $this->input->post('alamat', true),
                    "id_level" => $this->input->post('id_level', true),
                    "password" => $this->input->post('password', true)

                ];
            } else {
                $dataUser = [
                    "id_user" => $this->input->post('id_user', true),
                    "nama" => $this->input->post('nama', true),
                    "email" => $this->input->post('email', true),
                    "nohp" => $this->input->post('nohp', true),
                    "no_ktp" => $this->input->post('no_ktp', true),
                    "alamat" => $this->input->post('alamat', true),
                    "id_level" => $this->input->post('id_level', true),
                    "id_cafe" => $this->input->post('id_cafe', true),
                    "password" => $this->input->post('password', true)

                ];
            }
            $this->User_model->insertUser($dataUser);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/adminUser');
        }
    }

    public function deleteUser($id)
    {
        $this->User_model->deleteUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/adminUser');
    }

    public function detailUser($id)
    {
        $data['judul'] = 'Form Update Data User';
        $data['resultUser'] = $this->User_model->getUser($id);
        $data['resultLevel'] = $this->Level_model->getLevel();
        $data['resultCafe'] = $this->Cafe_model->getCafe();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-user/update', $data);
        $this->load->view('templates/footer');
    }

    public function showInsertForm()
    {
        $data['judul'] = 'Form Insert User';
        $data['resultLevel'] = $this->Level_model->getLevel();
        $data['resultCafe'] = $this->Cafe_model->getCafe();
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
            $idcafe = $this->input->post('id_cafe', true);
            if ($this->input->post('id_cafe', true) == 0) {
                $dataUser = [
                    "id_user" => $this->input->post('id_user', true),
                    "nama" => $this->input->post('nama', true),
                    "email" => $this->input->post('email', true),
                    "nohp" => $this->input->post('nohp', true),
                    "no_ktp" => $this->input->post('no_ktp', true),
                    "alamat" => $this->input->post('alamat', true),
                    "id_level" => $this->input->post('id_level', true),
                    "id_cafe" => null,
                    "password" => $this->input->post('password', true)

                ];
            } else {
                $dataUser = [
                    "id_user" => $this->input->post('id_user', true),
                    "nama" => $this->input->post('nama', true),
                    "email" => $this->input->post('email', true),
                    "nohp" => $this->input->post('nohp', true),
                    "no_ktp" => $this->input->post('no_ktp', true),
                    "alamat" => $this->input->post('alamat', true),
                    "id_level" => $this->input->post('id_level', true),
                    "id_cafe" => $this->input->post('id_cafe', true),
                    "password" => $this->input->post('password', true)

                ];
            }
            $status = $this->User_model->updateUser($dataUser, $this->input->post('id_user', true));
            if ($status == true) {
                $this->session->set_flashdata('flash', 'Diubah');

                redirect('admin/adminUser');
            } else {
                $this->session->set_flashdata('error', 'Diubah' . $idcafe);
                redirect('admin/adminUser');
            }
        }
    }

    //Cafe=====================================================================================================

    public function adminCafe()
    {
        if ($this->session->userdata('status') != "login") {
            redirect('admin');
            echo "hai false" . $this->session->userdata('status');
        } else {
            $data['judul'] = 'Konfigurasi User';
            $data['cafe'] = $this->Cafe_model->getCafe();
            $data['sewa'] = $this->Status_sewa_model->getStatus();
            if ($this->input->post('keyword')) {
                $data['cafe'] = $this->Cafe_model->findCafe();
            }
            $this->load->view('templates/header', $data);
            $this->load->view('admin/admin-cafe/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function insertCafe()
    {
        $dataCafe = [
            'id_cafe' => $this->input->post('id_cafe'),
            'nm_cafe' => $this->input->post('nm_cafe'),
            'fasilitas' => $this->input->post('fasilitas'),
            'daftar_menu' => $this->input->post('daftar_menu'),
            'jam_buka' => $this->input->post('jam_buka'),
            'jam_tutup' => $this->input->post('jam_tutup'),
            'alamat' => $this->input->post('alamat'),
            'no_wa' => $this->input->post('no_wa'),
            'kursi_sisa' => $this->input->post('kursi_sisa'),
            'kursi_max' => $this->input->post('kursi_max'),
            'id_status_sewa' => $this->input->post('id_status_sewa'),
            'harga_sewa_per_kursi' => $this->input->post('harga_sewa_per_kursi'),
            'harga_sewa_cafe' => $this->input->post('harga_sewa_cafe'),
            'gambar' => $this->_uploadImage($this->input->post('id_cafe'))
        ];
        $this->Cafe_model->insertCafe($dataCafe);
        $this->session->set_flashdata('flash', 'Ditambahkan' . $this->_uploadImage($this->input->post('id_cafe')));
        redirect('admin/adminCafe');
        echo "Success";
        // }
    }

    public function deleteCafe($id)
    {
        $this->Cafe_model->deleteCafe($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/adminCafe');
    }

    public function detailCafe($id)
    {
        $data['judul'] = 'Form Update Data Cafe';
        $data['resultCafe'] = $this->Cafe_model->getCafe($id);
        $data['resultStatus'] = $this->Status_sewa_model->getStatus();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/admin-cafe/update', $data);
        $this->load->view('templates/footer');
    }

    public function showInsertCafeForm()
    {
        $data['judul'] = 'Form Insert Cafe';
        $data['resultStatus'] = $this->Status_sewa_model->getStatus();

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
        // if (!empty($_FILES["image"]["name"])) {
        $dataCafe = [
            'id_cafe' => $this->input->post('id_cafe'),
            'nm_cafe' => $this->input->post('nm_cafe'),
            'fasilitas' => $this->input->post('fasilitas'),
            'daftar_menu' => $this->input->post('daftar_menu'),
            'jam_buka' => $this->input->post('jam_buka'),
            'jam_tutup' => $this->input->post('jam_tutup'),
            'alamat' => $this->input->post('alamat'),
            'no_wa' => $this->input->post('no_wa'),
            'kursi_sisa' => $this->input->post('kursi_sisa'),
            'kursi_max' => $this->input->post('kursi_max'),
            'id_status_sewa' => $this->input->post('id_status_sewa'),
            'harga_sewa_per_kursi' => $this->input->post('harga_sewa_per_kursi'),
            'harga_sewa_cafe' => $this->input->post('harga_sewa_cafe'),
            'gambar' => $this->_uploadImage($this->input->post('id_cafe'))
        ];
        echo $this->_uploadImage($this->input->post('id_cafe'));
        // } else {
        //     $dataCafe = [
        //         'id_cafe' => $this->input->post('id_cafe'),
        //         'nm_cafe' => $this->input->post('nm_cafe'),
        //         'fasilitas' => $this->input->post('fasilitas'),
        //         'daftar_menu' => $this->input->post('daftar_menu'),
        //         'jam_buka' => $this->input->post('jam_buka'),
        //         'jam_tutup' => $this->input->post('jam_tutup'),
        //         'alamat' => $this->input->post('alamat'),
        //         'no_wa' => $this->input->post('no_wa'),
        //         'kursi_sisa' => $this->input->post('kursi_sisa'),
        //         'kursi_max' => $this->input->post('kursi_max'),
        //         'id_status_sewa' => $this->input->post('id_status_sewa'),
        //         'harga_sewa_per_kursi' => $this->input->post('harga_sewa_per_kursi'),
        //         'harga_sewa_cafe' => $this->input->post('harga_sewa_cafe'),
        //         'gambar' => $this->input->post('old_image')
        //     ];
        //     echo $this->input->post('old_image') ."Lama";
        // }

        $status = $this->Cafe_model->updateCafe($dataCafe, $this->input->post('id_cafe'));
        if ($status == true) {
            $this->session->set_flashdata('flash', 'Diubah');
            // $this->_deleteImage($this->input->post('old_image'));
            redirect('admin/adminCafe');
        } else {
            $this->session->set_flashdata('error', 'Diubah');
            // var_dump($status);
            // echo "salah update";
            redirect('admin/adminCafe');
        }
        // }
    }

    public function _uploadImage($id_cafe = null)
    {
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['file_name'] = $id_cafe;
        $config['overwrite'] = true;
        $config['max_size'] = 2024;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }
        return $this->upload->display_errors();
    }

    private function _deleteImage($id)
    {
        $product = $this->Cafe_model->getCafe($id);
        if ($product['gambar'] != "default.jpg") {
            $filename = explode(".", $product['image'])[0];
            return array_map('unlink', glob(base_url() . "upload/product/$filename.*"));
        }
    }
}
