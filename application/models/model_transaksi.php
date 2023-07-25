

<?php

class Model_transaksi extends CI_Model{
	
	public function tampil_data(){
		$result = $this->db->get('tb_transaksi');
		if ($result->num_rows() >0 ) {
			return $result->result();
		}else{
			return false;
		}
	}
	public function ambil_id_invoice($id_invoice){
		$result = $this->db->where('id_tran',$id_invoice)->get('tb_transaksi');
		if($result->num_rows() > 0) {
			return $result->result();

		}else{
			return false;
		}
	}
	public function ambil_id_pesanan($id_invoice){
		$result = $this->db->where('id_tran', $id_invoice)->get('tb_transaksi');
		if ($result->num_rows() > 0) {
			$invoice = $result->row();
			$result = $this->db->where('id_prg', $invoice->id_prg)->get('tb_program');
			if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function getUserByUsername($username) {
        $query = $this->db->get_where('tb_user', array('username' => $username));
        return $query->row_array();
    }
	public function insert_transaksi($data) {
        $this->db->insert('tb_transaksi', $data);
        return $this->db->affected_rows() > 0;
    }
	
	public function getTransaksiByUserId($user_id) {
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_user', 'tb_user.id = tb_transaksi.user_id');
		$this->db->where('tb_transaksi.user_id', $user_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getIdUsername($username) {
        $query = $this->db->get_where('tb_user', array('username' => $username));
    return $query->row();
    }
	
}