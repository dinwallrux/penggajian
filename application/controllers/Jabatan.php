<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model('jabatan_model');
    }
	
	public function index()
	{
	    $data=array(
	            "title"     =>  "Jabatan",
	            "content"   =>  "jabatan/datauser",
	            "extra"     =>  "jabatan/js/js_datauser"
	        );
		$this->load->view('layout/wrapper',$data);
	}

	public function Listdata(){
		$result=$this->jabatan_model->listjabatan();
		echo json_encode($result);
	}

	public function AddData(){
		$this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'trim|required');
		$this->form_validation->set_rules('tunjjabatan', 'Tunj. Jabatan', 'trim|required');
		$this->form_validation->set_rules('piket', 'Tunj. Piket', 'trim|required');
		$this->form_validation->set_rules('bpjs', 'Tunj. BPJS', 'trim|required');
		$this->form_validation->set_rules('makan', 'Tunj. Makan', 'trim|required');
		$this->form_validation->set_rules('hadir', 'Tunj. Kehadiran', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$jabatan = $this->security->xss_clean($this->input->post('jabatan'));
		$tunjjabatan = $this->security->xss_clean($this->input->post('tunjjabatan'));
		$piket = $this->security->xss_clean($this->input->post('piket'));
		$bpjs = $this->security->xss_clean($this->input->post('bpjs'));
		$makan = $this->security->xss_clean($this->input->post('makan'));
		$hadir = $this->security->xss_clean($this->input->post('hadir'));
        
		$data=array(
			"namajabatan"	=>	$jabatan,
			"tunj_jabatan"	=>	$tunjjabatan,
			"tunj_piket"	=>	$piket,
			"bpjs"		    =>	$bpjs,
			"tunj_makan"    =>	$makan,
			"hadir"		    =>	$hadir,
		);

		$result = $this->jabatan_model->insertData($data);
		if ($result["code"]==0) {
			echo "Data sukses tersimpan";
		}else{
			echo $result["message"];
		}
	}

	public function updateData(){
		$this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'trim|required');
		$this->form_validation->set_rules('tunjjabatan', 'Tunj. Jabatan', 'trim|required');
		$this->form_validation->set_rules('piket', 'Tunj. Piket', 'trim|required');
		$this->form_validation->set_rules('bpjs', 'Tunj. BPJS', 'trim|required');
		$this->form_validation->set_rules('makan', 'Tunj. Makan', 'trim|required');
		$this->form_validation->set_rules('hadir', 'Tunj. Kehadiran', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$jabatan = $this->security->xss_clean($this->input->post('jabatan'));
		$tunjjabatan = $this->security->xss_clean($this->input->post('tunjjabatan'));
		$piket = $this->security->xss_clean($this->input->post('piket'));
		$bpjs = $this->security->xss_clean($this->input->post('bpjs'));
		$makan = $this->security->xss_clean($this->input->post('makan'));
		$hadir = $this->security->xss_clean($this->input->post('hadir'));

		$data=array(
			"tunj_jabatan"	=>	$tunjjabatan,
			"tunj_piket"	=>	$piket,
			"bpjs"		    =>	$bpjs,
			"tunj_makan"    =>	$makan,
			"hadir"		    =>	$hadir,
		);

		$result = $this->jabatan_model->updateData($data,$jabatan);

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
