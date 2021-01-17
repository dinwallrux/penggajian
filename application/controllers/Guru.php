<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model('guru_model');
	   $this->load->model('jabatan_model');
    }
	
	public function index()
	{
	    $result=$this->jabatan_model->listjabatan();
	    $data=array(
	            "title"     =>  "Guru",
	            "jabatan"   =>  $result,
	            "content"   =>  "guru/datauser",
	            "extra"     =>  "guru/js/js_datauser"
	        );
		$this->load->view('layout/wrapper',$data);
	}

	public function Listdata(){
		$result=$this->guru_model->listuser();
		echo json_encode($result);
	}

	public function AddData(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nikah', 'Status Pernikahan', 'trim|required');
		$this->form_validation->set_rules('anak', 'Anak', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('masuk', 'Tahun Masuk', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$username = $this->security->xss_clean($this->input->post('username'));
		$nama = $this->security->xss_clean($this->input->post('nama'));
		$alamat = $this->security->xss_clean($this->input->post('alamat'));
		$jnskel = $this->security->xss_clean($this->input->post('jnskel'));
		$jabatan = $this->security->xss_clean($this->input->post('jabatan'));
		$nikah = $this->security->xss_clean($this->input->post('nikah'));
		$anak = $this->security->xss_clean($this->input->post('anak'));
		$masuk = $this->security->xss_clean($this->input->post('masuk'));
		$telp = $this->security->xss_clean($this->input->post('telp'));

		$data=array(
			"nip"	=>	$username,
			"nama"		=>	$nama,
			"alamat"	=>	$alamat,
			"jnskel"	=>	$jnskel,
			"jabatan"	=>	$jabatan,
			"nikah"     =>  $nikah,
			"anak"      =>  $anak,
			"masuk"     =>  $masuk,
			"telp"      =>  $telp,
			"role"      =>  "Guru"
		);

		$result = $this->guru_model->insertData($data);
		if ($result["code"]==0) {
			echo "Data sukses tersimpan";
		}else{
			echo $result["message"];
		}
	}

	public function updateData(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nikah', 'Status Pernikahan', 'trim|required');
		$this->form_validation->set_rules('anak', 'Anak', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('masuk', 'Tahun Masuk', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$username = $this->security->xss_clean($this->input->post('username'));
		$nama = $this->security->xss_clean($this->input->post('nama'));
		$alamat = $this->security->xss_clean($this->input->post('alamat'));
		$jnskel = $this->security->xss_clean($this->input->post('jnskel'));
		$jabatan = $this->security->xss_clean($this->input->post('jabatan'));
		$nikah = $this->security->xss_clean($this->input->post('nikah'));
		$anak = $this->security->xss_clean($this->input->post('anak'));
		$masuk = $this->security->xss_clean($this->input->post('masuk'));
		$telp = $this->security->xss_clean($this->input->post('telp'));

		$data=array(
			"nama"		=>	$nama,
			"alamat"	=>	$alamat,
			"jnskel"	=>	$jnskel,
			"jabatan"	=>	$jabatan,
			"nikah"     =>  $nikah,
			"anak"      =>  $anak,
			"masuk"     =>  $masuk,
			"telp"      =>  $telp
		);

		$result = $this->guru_model->updateData($data,$username);

		if ($result["code"]==0) {
			echo "Data sukses tersimpan";
		}else{
			echo $result["message"];
		}
	}

	public function DelData(){
		$kode= $this->security->xss_clean($this->input->post('kode'));
		$result = $this->guru_model->hapusData($kode);
		if ($result["code"]==0) {
			echo "Data berhasil di hapus";
		}else{
			echo "Data gagal di hapus";
		}

	}

}
