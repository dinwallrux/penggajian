<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model('absensi_model');
    }
	
	public function index()
	{
	    $data=array(
	            "title"     =>  "Absensi",
	        );
		$this->load->view('absensi/datauser',$data);
	}

	public function absenkeluar()
	{
	    $data=array(
	            "title"     =>  "Absensi",
	        );
		$this->load->view('absensi/datakeluar',$data);
	}

	public function dataabsen()
	{
	    $data=array(
	            "title"     =>  "Data Absensi",
	            "content"   =>  "absensi/dataabsen",
	            "extra"     =>  "absensi/js/js_dataabsen"
	        );
		$this->load->view('layout/wrapper',$data);
	}

	public function Listabsen(){
		$result=$this->absensi_model->listdata();
		echo json_encode($result);
	}

	public function checkin(){
		$this->form_validation->set_rules('username', 'NIP', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$nip = $this->security->xss_clean($this->input->post('username'));
    	$result=$this->absensi_model->getuser($nip);
    	$today=date("Y-m-d")." 07:30";
    	if (time()>strtotime($today)){
            $this->session->set_flashdata('message','Anda tidak bisa login');
    		redirect ("absensi","refresh");
    	    return;
    	}
		if ($result["code"]==0){
		    $data=array(
		        "nip"       =>  $nip,
		        "tgl"   => date("Y-m-d"),
		        "masuk"  =>  date("Y-m-d H:i:s"),
		    );
    		
    		$hasil=$this->absensi_model->insertData($data);
    		$this->session->set_flashdata('message','Selamat Datang '.$result["message"][0]["nama"]);
    		redirect ("absensi","refresh");
		} else{
    		$this->session->set_flashdata('message','Periksa kembali NIP anda');
    		redirect ("absensi","refresh");
    	}
	}

	public function checkout(){
		$this->form_validation->set_rules('username', 'NIP', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$nip = $this->security->xss_clean($this->input->post('username'));
		$today=date("Y-m-d");
    	$result=$this->absensi_model->getabsen($nip);
		if ($result["code"]==0){
		    $keluar=date("Y-m-d H:i:s");
    		$result=$this->absensi_model->updateData($keluar,$nip,$today);
    		print_r($result);
    		$this->session->set_flashdata('message','Terima Kasih '.$result["message"][0]["nama"]);
    		redirect ("absensi/absenkeluar","refresh");
		} else{
    		$this->session->set_flashdata('message','Periksa kembali NIP anda');
    		redirect ("absensi/absenkeluar","refresh");
    	}
	}


	
	public function validasi($nip,$masuk){
	    $result=$this->absensi_model->checkvalid($nip,$masuk);
	    print_r($result);
	    if ($result["code"]==0){
    		$this->session->set_flashdata('sukses','Data berhasil di validasi');
        	redirect ("absensi/dataabsen","refresh");
		} else{
    		$this->session->set_flashdata('error','Data gagal di validasi');
        	redirect ("absensi/dataabsen","refresh");
    	}
	}
}
