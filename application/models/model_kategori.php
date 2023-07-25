<?php
class Model_kategori extends CI_Model{
	public function Sumbangan_Keagamaan(){
		return $this->db->get_where("tb_program",array('kategori'=> 'Sumbangan Keagamaan'));
	}
	public function Sumbangan_Kemanusiaan(){
		return $this->db->get_where("tb_program",array('kategori'=> 'Sumbangan Kemanusiaan'));
	}
	public function Sumbangan_Pendidikan(){
		return $this->db->get_where("tb_program",array('kategori'=> 'Sumbangan Pendidikan'));
	}
	public function Sumbangan_Kesehatan(){
		return $this->db->get_where("tb_program",array('kategori'=> 'Sumbangan Kesehatan'));
	}
	public function Sumbangan_Bencana(){
		return $this->db->get_where("tb_program",array('kategori'=> 'Sumbangan Bencana'));
	}
	
}