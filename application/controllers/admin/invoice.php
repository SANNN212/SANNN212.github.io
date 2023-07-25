<?php

class Invoice extends CI_Controller{
	public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->load->model('model_transaksi');
    }

    public function index() {
        $data['invoice'] = $this->model_transaksi->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail($id_invoice) {
        $data['invoice'] = $this->model_transaksi->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_transaksi->ambil_id_pesanan($id_invoice);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
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




	// function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('model_transaksi');
    // }
	// public function index(){
	// 	$data['invoice'] = $this->model_transaksi->tampil_data();
	// 	$this->load->view('templates_admin/header');
	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/invoice',$data);
	// 	$this->load->view('templates_admin/footer');
	// }
	
	// public function detail($id_invoice){
	// 	$data['invoice'] = $this->model_transaksi->ambil_id_invoice($id_invoice);
	// 	$data['pesanan'] = $this->model_transaksi->ambil_id_pesanan($id_invoice);

	// 	$this->load->view('templates_admin/header');
	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/detail_invoice',$data);
	// 	$this->load->view('templates_admin/footer');
	// }
}