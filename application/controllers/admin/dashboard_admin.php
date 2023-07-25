<?php 

class Dashboard_admin extends CI_Controller{
	public function __construct() {
        parent::__construct();
        $this->check_login();
    }

    public function index() {
        $username = $this->session->userdata('username');
        $data['user'] = $this->model_transaksi->getUserByUsername($username);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }

    private function check_login() {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda belum login.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
        }
    }
}