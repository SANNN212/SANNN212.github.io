<?php 
class Dashboard extends CI_Controller{
// 	function __construct()
//     {
//         parent::__construct();
//         $this->load->model('model_program');
//         $this->load->model('model_transaksi');
//     }
// 	public function index()
// 	{
// 		$data['program'] = $this->model_program->tampil_data()->result();
// 		$this->load->view('templates/header');
// 		$this->load->view('templates/sidebar');
// 		$this->load->view('dashboard',$data);
// 		$this->load->view('templates/footer');
// 	}

// 	public function pembayaran($id_prg)
// {
//     $username = $this->session->userdata('username');
//     $data['user'] = $this->model_transaksi->getUserByUsername($username);
// 	$data['program'] = $this->model_program->detail_program($id_prg);

//     $this->load->view('templates/header');
//     $this->load->view('templates/sidebar');
//     $this->load->view('pembayaran', $data);
//     $this->load->view('templates/footer');
// }

// 	public function detail($id_prg){
// 		$data['program'] = $this->model_program->detail_program($id_prg);
// 		$this->load->view('templates/header');
// 		// $this->load->view('templates/sidebar');
// 		$this->load->view('detail_program',$data);
// 		$this->load->view('templates/footer');
// 	}
// 	public function search(){
// 		$keyword = $this->input->post('keyword');
// 		$data['program']=$this->model_program->get_keyword($keyword);
// 		$this->load->view('templates/header');
// 		$this->load->view('templates/sidebar');
// 		$this->load->view('dashboard',$data);
// 		$this->load->view('templates/footer');
// 	}
// 	public function proses_pesanan() {
// 		$id_prg = $this->input->post('id_prg');
// 		$nominal = $this->input->post('nominal');
// 		$metode = $this->input->post('mtd');
	
	
// 		$program = $this->model_program->get_program($id_prg);
// 		$user = $this->model_auth->get_user($this->session->userdata('username'));
	
// 		$data = array(
// 			'nama' => $user['nama'],
// 			'nominal' => $nominal,
// 			'mtd_bayar' => $metode,
// 			'tgl_tran' => date('Y-m-d H:i:s'),
// 			'id_prg' => $id_prg,
// 			'user_id' => $user['id'],
// 		);
	
// 		$is_processed = $this->model_transaksi->insert_transaksi($data);
	
// 		if ($is_processed) {
// 			$this->cart->destroy();
// 			$this->load->view('templates/header');
// 			$this->load->view('templates/sidebar');
// 			$this->load->view('proses_pesanan');
// 			$this->load->view('templates/footer');
// 		} else {
// 			echo "Maaf, Sumbangan anda belum bisa kami proses!";
// 		}
// 	}


// 	public function riwayat_transaksi() {
// 		$user_id = $this->session->userdata('id');
// 		$data['transaksi'] = $this->model_transaksi->getTransaksiByUser($user_id);
// 		$this->load->view('riwayat_transaksi', $data);
// 	}
	

function __construct() {
	parent::__construct();
	$this->check_login();
	$this->load->model('model_program');
	$this->load->model('model_transaksi');
}

public function index() {
	$data['program'] = $this->model_program->tampil_data()->result();
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('dashboard', $data);
	$this->load->view('templates/footer');
}

public function pembayaran($id_prg) {
	$username = $this->session->userdata('username');
	$data['user'] = $this->model_transaksi->getUserByUsername($username);
	$data['program'] = $this->model_program->detail_program($id_prg);

	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('pembayaran', $data);
	$this->load->view('templates/footer');
}

public function detail($id_prg) {
	$data['program'] = $this->model_program->detail_program($id_prg);
	$this->load->view('templates/header');
	$this->load->view('detail_program', $data);
	$this->load->view('templates/footer');
}

public function search() {
	$keyword = $this->input->post('keyword');
	$data['program'] = $this->model_program->get_keyword($keyword);
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('dashboard', $data);
	$this->load->view('templates/footer');
}

public function proses_pesanan() {
	$id_prg = $this->input->post('id_prg');
	$nominal = $this->input->post('nominal');
	$metode = $this->input->post('mtd');

	$program = $this->model_program->get_program($id_prg);
	$user = $this->model_auth->get_user($this->session->userdata('username'));

	$data = array(
		'nama' => $user['nama'],
		'nominal' => $nominal,
		'mtd_bayar' => $metode,
		'tgl_tran' => date('Y-m-d H:i:s'),
		'id_prg' => $id_prg,
		'user_id' => $user['id'],
	);

	$is_processed = $this->model_transaksi->insert_transaksi($data);

	if ($is_processed) {
		$this->cart->destroy();
		$this->load->view('templates/header');
		$this->load->view('proses_pesanan');
		$this->load->view('templates/footer');
	} else {
		echo "Maaf, Sumbangan anda belum bisa kami proses!";
	}
}

public function riwayat_transaksi() {
    $username = $this->session->userdata('username');
    $user = $this->model_transaksi->getIdUsername($username);
    $id_user = $user->id;

    $result = $this->db->where('user_id', $id_user)->get('tb_transaksi');

    if ($result->num_rows() > 0) {
        $data['riwayat_transaksi'] = $result->result();
		$this->load->view('templates/header');
        $this->load->view('riwayat_transaksi', $data);
		$this->load->view('templates/footer');
    } else {
		$this->load->view('templates/header');
        $this->load->view('tidak_ada_data');
		$this->load->view('templates/footer');
    }
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
