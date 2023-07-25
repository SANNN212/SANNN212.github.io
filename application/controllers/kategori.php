<?php
class Kategori extends CI_Controller{
	public function agama(){
		$data['agama'] = $this->model_kategori->Sumbangan_Keagamaan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('agama',$data);
		$this->load->view('templates/footer');
	}
	public function manusia(){
		$data['manusia'] = $this->model_kategori->Sumbangan_Kemanusiaan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('manusia',$data);
		$this->load->view('templates/footer');
	}
	public function pendidikan(){
		$data['pendidikan'] = $this->model_kategori->Sumbangan_Pendidikan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pendidikan',$data);
		$this->load->view('templates/footer');
	}
	public function sehat(){
		$data['sehat'] = $this->model_kategori->Sumbangan_Kesehatan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kesehatan',$data);
		$this->load->view('templates/footer');
	}
	public function bencana(){
		$data['bencana'] = $this->model_kategori->Sumbangan_Bencana()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('bencana',$data);
		$this->load->view('templates/footer');
	}

}