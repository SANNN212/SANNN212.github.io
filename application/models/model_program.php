<?php
class Model_program extends CI_Model{
	public function tampil_data(){
		return $this->db->get('tb_program');
	}
	public function tampil_nama(){
		return $this->db->get('tb_user');
	}
	public function tambah_program($data,$table){
		$this->db->insert($table,$data);
	}
	public function edit_program($where,$table){
		return $this->db->get_where($table,$where);
	}
	public function update_program($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function hapus_program($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function find($id){
		$result = $this->db->where('id_prg',$id)
							->limit(1)
							->get('tb_program');
		if($result->num_rows() > 0) {
			return $result->row();		
		}else{
			return array();
		}
	}
	public function detail_program($id_prg){
		$result = $this->db->where('id_prg',$id_prg)->get('tb_program');
		if($result->num_rows() > 0) {
			return $result->result();

		}else{
			return false;
		}
	}
	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('tb_program');
		$this->db->like('nama_brg',$keyword);
		$this->db->or_like('keterangan' ,$keyword);
		$this->db->or_like('kategori' ,$keyword);
		return $this->db->get()->result();
	}
	
	public function get_program($id_prg) {
        $query = $this->db->get_where('tb_program', array('id_prg' => $id_prg));
        return $query->row_array();
    }

}