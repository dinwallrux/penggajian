<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model('guru_model');
	   $this->load->model('cuti_model');
    }
	
	public function index()
	{
	    $result=$this->guru_model->Listuser();
	    $data=array(
	            "title"     =>  "Pengajuan Cuti",
	            "guru"      =>  $result,
	            "content"   =>  "cuti/datauser",
	            "extra"     =>  "cuti/js/js_datauser"
	        );
		$this->load->view('layout/wrapper',$data);
	}

	public function Listdata(){
		$result=$this->cuti_model->listcuti();
		echo json_encode($result);
	}


	public function AddData(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('awal', 'Awal Cuti', 'trim|required');
		$this->form_validation->set_rules('akhir', 'Akhir Cuti', 'trim|required');
		$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return;
		}
		
		$nip = $this->security->xss_clean($this->input->post('username'));
		$awal = $this->security->xss_clean($this->input->post('awal'));
		$akhir = $this->security->xss_clean($this->input->post('akhir'));
		$alasan = $this->security->xss_clean($this->input->post('alasan'));

        $path=$_SERVER['DOCUMENT_ROOT'];
        $config['upload_path'] = $path.'/assets/cuti/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if(!empty($_FILES['bukti']['name'])){
            if ($this->upload->do_upload('bukti')){
                $gbr = $this->upload->data();
                $ext = pathinfo($path.'assets/cuti/'.$gbr['file_name'], PATHINFO_EXTENSION);
                rename($path.'assets/cuti/'.$gbr['file_name'],$path.'assets/cuti/'.$nip."-".$awal.".".$ext);

                $imagename=$nip."-".$awal.".".$ext;
            }
                      
        }else{
            echo "disana";
        }
        
       

		$data=array(
			"nip"	    =>	$nip,
			"awal"		=>	$awal,
			"akhir"	    =>	$akhir,
			"alasan"	=>	$alasan,
			"tanggal_aju"	=>	date("Y-m-d"),
			"bukti"     => $imagename,
		);

		$result = $this->cuti_model->insertData($data);
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

	public function validasi($nip,$aju,$awal,$akhir){
	    $result=$this->cuti_model->checkvalid($nip,$aju,$awal,$akhir);
	    if ($result["code"]==0){
    		$this->session->set_flashdata('sukses','Data berhasil di validasi');
        	redirect ("absensi/dataabsen","refresh");
		} else{
    		$this->session->set_flashdata('error','Data gagal di validasi');
        	redirect ("absensi/dataabsen","refresh");
    	}
	}
}
