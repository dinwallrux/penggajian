<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian extends CI_Controller {

	public function __construct() {
	   parent::__construct();
	   $this->load->model('gaji_model');
    }
	
	public function index()
	{
	    $data=array(
	            "title"     =>  "Daftar Penggajian",
	            "content"   =>  "penggajian/datauser",
	            "extra"     =>  "penggajian/js/js_datauser"
	        );
		$this->load->view('layout/wrapper',$data);
	}

    public function listdata(){
		$bulan = $this->security->xss_clean($this->input->post('bulan'));
		$tahun = $this->security->xss_clean($this->input->post('tahun'));
        
        $result=$this->gaji_model->listGaji($bulan,$tahun,"");
        $data=array();
        foreach ($result["gaji"] as $gj){
            $hitung=$gj["pokok"]+$gj["tunj_jabatan"]+$gj["tunj_piket"];
            $temp["nip"]=$gj["nip"];
            $temp["nama"]=$gj["nama"];
            $temp["cuti"]="";
            foreach ($result["cuti"] as $ct){
                if ($gj["nip"]==$ct["nip"]){
                    $temp["cuti"]=$ct["cuti"]." hari";
                }
            }
            
            $temp["hadir"]="";
            $temp["kjm"]="";
            foreach ($result["absen"] as $ab){
                if ($gj["nip"]==$ab["nip"]){
                    $temp["kjm"]=$ab["kjm"];
                    $temp["hadir"]=$ab["hadir"];
                    $hitung=$hitung+($ab["kjm"]*25000);
                    $hitung=$hitung+($ab["hadir"]*$gj["tunj_makan"]);
                    $hitung=$hitung+($ab["hadir"]*$gj["hadir"]);
                }
            }
            
            
            if ($gj["nikah"]=="Ya"){
                $hitung=$hitung+($gj["pokok"]*0.05);
                if ($gj["anak"]>0){
                    $hitung=$hitung+($gj["pokok"]*0.02*$gj["anak"]);
                }
            }
            
            //iuran wajib, tunj pendidikan, bpjs
            $hitung=$hitung+(0.1*$gj["pokok"])-(0.1*$gj["pokok"])-$gj["bpjs"];
            $temp["gaji"]=$hitung;
            array_push($data,$temp);
        }
        echo json_encode($data);
    }
    
    public function detailgaji($bulan,$tahun,$nip){
        $result=$this->gaji_model->listGaji($bulan,$tahun,$nip);
        echo json_encode($result);
    }
}
