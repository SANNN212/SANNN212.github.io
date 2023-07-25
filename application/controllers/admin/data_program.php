<?php  
class Data_program extends CI_Controller{
	public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->load->model('model_program');
    }
	public function index() {
        $data['program'] = $this->model_program->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_program', $data);
        $this->load->view('templates_admin/footer');
    }
	public function tambah_aksi(){
		$nama_barang	=$this->input->post('nama_prg');
		$keterangan		=$this->input->post('keterangan');
		$kategori		=$this->input->post('kategori');
		$harga			=$this->input->post('sumbangan');
		$gambar			=$_FILES['gambar']['name'];
		if ($gambar='') {}else{
			$config['upload_path'] ='./gambarmaul';
			$config['allowed_types']='jpg|jpeg|png';

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Format Gambar Salah KONTOL!!";
			}else{
				$gambar=$this->upload->data('file_name');
			}
		}
		$data = array(
			'nama_prg' => $nama_barang,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'sumbangan' => $harga,
			'jml_smbg' => '0',
			'gambar' => $gambar
		);
		$this->model_program->tambah_program($data,'tb_program');
		redirect('admin/data_program/index');
	
	}
	public function edit($id){
		$where = array('id_prg' => $id);
		$data['program'] = $this->model_program->edit_program($where,'tb_program')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_program',$data);
		$this->load->view('templates_admin/footer');
	}
	public function update(){
		$id =$this->input->post('id_prg');
		$nama_brg =$this->input->post('nama_prg');
		$keterangan =$this->input->post('keterangan');
		$kategori =$this->input->post('kategori');
		$harga =$this->input->post('sumbangan');
		$stok =$this->input->post('jml_smbg');

		$data = array(
			'nama_prg' => $nama_brg,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'sumbangan' => $harga,
			'jml_smbg' => $stok
		);
		$where= array('id_prg' =>$id);
		$this->model_program->update_program($where,$data,'tb_program');
		redirect('admin/data_program/index');
	}
	public function hapus($id){
		$where = array('id_prg' => $id);
		$this->model_program->hapus_program($where,'tb_program');
		redirect('admin/data_program/index');
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
