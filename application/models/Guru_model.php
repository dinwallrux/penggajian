<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model{
    private $pengguna = 'guru';
    private $gurumapel = 'gurumapel';
    private $mapel      = 'mapel';

	public function Listuser(){
		$sql="SELECT * FROM ".$this->pengguna;
		$query=$this->db->query($sql);
		if ($query){
			return $query->result_array();
		}else{
			return $this->db->error();
		}
	}


	public function insertData($data){
		if ($this->db->insert($this->pengguna,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

	public function updateData($data,$username){		
		$this->db->where("username",$username);

		if ($this->db->update($this->pengguna,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

}
?>