<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajar extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model('ajar_model');
    }
	
	public function index()
	{
	    $data=array(
	            "title"     =>  "Absensi Mengajar",
	        );
		$this->load->view('ajar/datauser',$data);
	}

	public function absenkeluar()
	{
	    $data=array(
	            "title"     =>  "Absensi Mengajar",
	        );
		$this->load->view('ajar/datakeluar',$data);
	}

	public function dataajar()
	{
	    $data=array(
	            "title"     =>  "Data Absen Mengajar",
	            "content"   =>  "ajar/dataajar",
	            "extra"     =>  "ajar/js/js_dataajar"
	        );
		$this->load->view('layout/wrapper',$data);
	}

	public function Listajar(){
		$result=$this->ajar_model->listdata();
		echo json_encode($result);
	}

	public function checkin(){
		$this->form_validation->set_rules('username', 'NIP', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$nip = $this->security->xss_clean($this->input->post('username'));
    	$result=$this->ajar_model->getuser($nip);
		if ($result["code"]==0){
		    $data=array(
		        "nip"       =>  $nip,
		        "tglmasuk"  =>  date("Y-m-d"),
		        "jam_masuk"  =>  date("H:i:s")
		    );
    		
    		$hasil=$this->ajar_model->insertData($data);
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
    	$result=$this->ajar_model->getabsen($nip);
		if ($result["code"]==0){
		    $data=array(
		        "nip"       =>  $nip,
		        "tglmasuk"  =>  date("Y-m-d"),
		        "jam_keluar" => date("H:i:s")
		    );
    		
    		$this->ajar_model->updateData($data,$nip,$today);
    		$this->session->set_flashdata('message','Terima Kasih '.$result["message"][0]["nama"]);
    		redirect ("absensi/absenkeluar","refresh");
		} else{
    		$this->session->set_flashdata('message','Periksa kembali NIP anda');
    		redirect ("absensi/absenkeluar","refresh");
    	}
	}

	public function updateData(){
		$this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'trim|required');
		$this->form_validation->set_rules('pokok', 'Gaji Pokok', 'trim|required');
		$this->form_validation->set_rules('tunjjabatan', 'Tunj. Jabatan', 'trim|required');
		$this->form_validation->set_rules('piket', 'Tunj. Piket', 'trim|required');
		$this->form_validation->set_rules('pendidik', 'Tunj. Pendidik', 'trim|required');
		$this->form_validation->set_rules('bpjs', 'Tunj. BPJS', 'trim|required');
		$this->form_validation->set_rules('istri', 'Tunj. Istri', 'trim|required');
		$this->form_validation->set_rules('anak', 'Tunj. Anak', 'trim|required');
		$this->form_validation->set_rules('makan', 'Tunj. Makan', 'trim|required');
		$this->form_validation->set_rules('hadir', 'Tunj. Kehadiran', 'trim|required');
		$this->form_validation->set_rules('wajib', 'Iuran Wajib', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$jabatan = $this->security->xss_clean($this->input->post('jabatan'));
		$pokok = $this->security->xss_clean($this->input->post('pokok'));
		$tunjjabatan = $this->security->xss_clean($this->input->post('tunjjabatan'));
		$piket = $this->security->xss_clean($this->input->post('piket'));
		$pendidik = $this->security->xss_clean($this->input->post('pendidik'));
		$bpjs = $this->security->xss_clean($this->input->post('bpjs'));
		$istri = $this->security->xss_clean($this->input->post('istri'));
		$anak = $this->security->xss_clean($this->input->post('anak'));
		$makan = $this->security->xss_clean($this->input->post('makan'));
		$hadir = $this->security->xss_clean($this->input->post('hadir'));
		$wajib = $this->security->xss_clean($this->input->post('wajib'));

		$data=array(
			"pokok"		    =>	$pokok,
			"tunj_jabatan"	=>	$tunjjabatan,
			"tunj_piket"	=>	$piket,
			"tunj_pendidik"	=>	$pendidik,
			"bpjs"		    =>	$bpjs,
			"tunj_istri"	=>	$istri,
			"tunj_anak"		=>	$anak,
			"tunj_makan"    =>	$makan,
			"hadir"		    =>	$hadir,
			"iuranwajib"	=>	$wajib,
		);

		$result = $this->jabatan_model->updateData($data,$namajabatan);

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
