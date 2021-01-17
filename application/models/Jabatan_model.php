<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model{
    private $pengguna = 'jabatan';

	public function Listjabatan(){
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


	public function updateData($data,$jabatan){		
		$this->db->where("namajabatan",$jabatan);

		if ($this->db->update($this->pengguna,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

}
?>