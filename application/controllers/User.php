<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model('user_model');
	   $this->load->model('jabatan_model');
    }
	
	public function index()
	{
	    $result=$this->jabatan_model->listjabatan();
	    $data=array(
	            "title"     =>  "Pengguna",
	            "jabatan"   =>  $result,
	            "content"   =>  "user/datauser",
	            "extra"     =>  "user/js/js_datauser"
	        );
		$this->load->view('layout/wrapper',$data);
	}

	public function Listdata(){
		$result=$this->user_model->listuser();
		echo json_encode($result);
	}

	public function AddData(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Passowrd', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('masuk', 'Tahun Masuk', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$nama = $this->security->xss_clean($this->input->post('nama'));
		$alamat = $this->security->xss_clean($this->input->post('alamat'));
		$jnskel = $this->security->xss_clean($this->input->post('jnskel'));
		$role = $this->security->xss_clean($this->input->post('role'));
		$nikah = $this->security->xss_clean($this->input->post('nikah'));
		$anak = $this->security->xss_clean($this->input->post('anak'));
		$masuk = $this->security->xss_clean($this->input->post('masuk'));
		$telp = $this->security->xss_clean($this->input->post('telp'));
		$jabatan = $this->security->xss_clean($this->input->post('jabatan'));
		$pokok = $this->security->xss_clean($this->input->post('pokok'));

		$data=array(
			"nip"	=>	$username,
			"password"	=>	sha1($password),
			"nama"		=>	$nama,
			"alamat"	=>	$alamat,
			"jabatan"   =>  $jabatan,
			"jnskel"	=>	$jnskel,
			"nikah"     =>  $nikah,
			"anak"      =>  $anak,
			"masuk"     =>  $masuk,
			"telp"      =>  $telp,
			"pokok"     =>  $pokok,
			"role"		=>	$role,
		);

		$result = $this->user_model->insertData($data);
		if ($result["code"]==0) {
			echo "Data sukses tersimpan";
		}else{
			echo $result["message"];
		}
	}

	public function updateData(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('masuk', 'Tahun Masuk', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$nama = $this->security->xss_clean($this->input->post('nama'));
		$alamat = $this->security->xss_clean($this->input->post('alamat'));
		$jnskel = $this->security->xss_clean($this->input->post('jnskel'));
		$role = $this->security->xss_clean($this->input->post('role'));
		$nikah = $this->security->xss_clean($this->input->post('nikah'));
		$anak = $this->security->xss_clean($this->input->post('anak'));
		$masuk = $this->security->xss_clean($this->input->post('masuk'));
		$telp = $this->security->xss_clean($this->input->post('telp'));
		$jabatan = $this->security->xss_clean($this->input->post('jabatan'));
		$pokok = $this->security->xss_clean($this->input->post('pokok'));

		if (empty($password)){
			$data=array(
				"nama"		=>	$nama,
				"alamat"	=>	$alamat,
				"jnskel"	=>	$jnskel,
				"jabatan"   =>	$jabatan,
				"role"		=>	$role,
    			"nikah"     =>  $nikah,
    			"anak"      =>  $anak,
    			"masuk"     =>  $masuk,
    			"telp"      =>  $telp,
    			"pokok"     =>  $pokok,
			);
		}else{
			$data=array(
				"password"	=>	sha1($password),
				"nama"		=>	$nama,
				"alamat"	=>	$alamat,
				"jnskel"	=>	$jnskel,
				"jabatan"   =>	$jabatan,
				"role"		=>	$role,
    			"nikah"     =>  $nikah,
    			"anak"      =>  $anak,
    			"masuk"     =>  $masuk,
    			"telp"      =>  $telp,
    			"pokok"     =>  $pokok,
			);
		}
		
		$result = $this->user_model->updateData($data,$username);
        
		if ($result["code"]==0) {
			echo "Data sukses tersimpan";
		}else{
			echo $result["message"];
		}
	}

	public function DelData(){
		$kode= $this->security->xss_clean($this->input->post('kode'));
		$result = $this->user_model->hapusData($kode);
		if ($result["code"]==0) {
			echo "Data berhasil di hapus";
		}else{
			echo "Data gagal di hapus";
		}

	}

}
