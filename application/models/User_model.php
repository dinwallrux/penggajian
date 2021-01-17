<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    private $pengguna = 'guru';

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
		$this->db->where("nip",$username);

		if ($this->db->update($this->pengguna,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

}
?>