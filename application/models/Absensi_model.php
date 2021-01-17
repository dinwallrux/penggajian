<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model{
    private $pengguna = 'guru';
    private $absen = 'absensi';

	public function getuser($nip){
		$sql="SELECT * FROM ".$this->pengguna." WHERE nip=?";
		$query=$this->db->query($sql,$nip);
		if ($query->num_rows()>0){
			return array("code"=>0,"message"=>$query->result_array());
		}else{
			return array("code"=>404,"message"=>"data tidak ditemukan");
		}
	}

	public function getabsen($nip){
		$sql="SELECT *,b.nama FROM ".$this->absen." a INNER JOIN ".$this->pengguna." b ON a.nip=b.nip WHERE a.nip=?";
		$query=$this->db->query($sql,$nip);
		if ($query->num_rows()>0){
			return array("code"=>0,"message"=>$query->result_array());
		}else{
			return array("code"=>404,"message"=>"data tidak ditemukan");
		}
	}

    public function listdata(){
        $sql="SELECT a.*,b.nama FROM ".$this->absen." a INNER JOIN ".$this->pengguna." b ON a.nip=b.nip";
        $query=$this->db->query($sql);
        return $query->result_array();
    }
    
    public function checkvalid($nip,$masuk){
        $masuk=urldecode($masuk);
        $sql="UPDATE ".$this->absen." SET status=1 WHERE nip=? AND masuk=?";
        if ($this->db->query($sql,array($nip,$masuk))){
           return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
    }

	public function insertData($data){
		if ($this->db->insert($this->absen,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

	public function updateData($keluar,$nip,$today){
	    $sql="UPDATE ".$this->absen." SET keluar=? WHERE nip=? AND DATE(masuk)=?";
		if ($this->db->query($sql, array($keluar,$nip,$today))){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

}
?>