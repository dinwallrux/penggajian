<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajar_model extends CI_Model{
    private $pengguna = 'guru';
    private $ajar = 'mengajar';

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
		$sql="SELECT *,b.nama FROM ".$this->ajar." a INNER JOIN ".$this->pengguna." b ON a.nip=b.nip WHERE a.nip=?";
		$query=$this->db->query($sql,$nip);
		if ($query->num_rows()>0){
			return array("code"=>0,"message"=>$query->result_array());
		}else{
			return array("code"=>404,"message"=>"data tidak ditemukan");
		}
	}

    public function listdata(){
        $sql="SELECT a.* FROM ".$this->ajar." a INNER JOIN ".$this->pengguna." b ON a.nip=b.nip";
        $query=$this->db->query($sql);
        return $query->result_array();
    }
    
	public function insertData($data){
		if ($this->db->insert($this->ajar,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

	public function updateData($data,$nip,$today){		
		$this->db->where(array("nip"=>$nip,"tglmasuk"=>$today));
		if ($this->db->update($this->ajar,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

}
?>