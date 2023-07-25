<?php 

class Auth extends CI_Controller{

	// public function login(){

	// 	$this->form_validation->set_rules('username','Username','required',['required' => 'Isi username lah bang']);
	// 	$this->form_validation->set_rules('password','Password','required',['required' => 'Isi password juga lah bang']);

	// 	if ($this->form_validation->run() == FALSE){
	// 		$this->load->view('templates/header');
	// 		$this->load->view('form_login');
	// 		$this->load->view('templates/footer');
	// 	}else{
	// 		$auth =$this->model_auth->cek_login();
	// 		if ($auth == FALSE) {
	// 			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
	// 		  Username atau Password anda salah bang!
	// 		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 		    <span aria-hidden="true">&times;</span>
	// 		  </button>
	// 		</div>');
	// 			redirect('auth/login');
	// 		}else{
	// 			$this->session->set_userdata('username',$auth->username);
	// 			$this->session->set_userdata('role_id',$auth->role_id);

	// 			switch($auth->role_id){
	// 				case 1: redirect('admin/dashboard_admin');
	// 				break;
	// 				case 2: redirect('dashboard');
	// 				break;
	// 				default: break;
	// 			}
	// 		}
	// 	}
	// }
	// public function login_admin(){

	// 	$this->form_validation->set_rules('username','Username','required',['required' => 'Isi username lah bang']);
	// 	$this->form_validation->set_rules('password','Password','required',['required' => 'Isi password juga lah bang']);

	// 	if ($this->form_validation->run() == FALSE){
	// 		$this->load->view('templates/header');
	// 		$this->load->view('admin/login_admin');
	// 		$this->load->view('templates/footer');
	// 	}else{
	// 		$auth =$this->model_auth->cek_login();
	// 		if ($auth == FALSE) {
	// 			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
	// 		  Username atau Password anda salah bang!
	// 		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 		    <span aria-hidden="true">&times;</span>
	// 		  </button>
	// 		</div>');
	// 			redirect('auth/login');
	// 		}else{
	// 			$this->session->set_userdata('username',$auth->username);
	// 			$this->session->set_userdata('role_id',$auth->role_id);

	// 			switch($auth->role_id){
	// 				case 1: redirect('admin/dashboard_admin');
	// 				break;
	// 				case 2: redirect('dashboard');
	// 				break;
	// 				default: break;
	// 			}
	// 		}
	// 	}
	// }
	// public function logout(){
	// 	$this->session->sess_destroy();
	// 	redirect('auth/login');
	// }

	public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->model_auth->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password anda salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth/login');
            } else {
                $user_data = array(
                    'username' => $auth->username,
                    'role_id' => $auth->role_id
                    // Informasi lain yang ingin Anda simpan dalam session
                );

                $this->session->set_userdata($user_data);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;
                    case 2:
                        redirect('dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}