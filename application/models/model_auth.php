<?php 

class Model_auth extends CI_Model{
	public function cek_login(){
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db->where('username',$username)
						   ->where('password',$password)
						   ->limit(1)
						   ->get('tb_user');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return array();
		}
	}
	public function get_user($username) {
        $query = $this->db->get_where('tb_user', array('username' => $username));
        return $query->row_array();
    }
	
}