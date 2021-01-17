<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_model extends CI_Model{
    private $pengguna = 'guru';
    private $cuti = 'cuti';

	public function Listcuti(){
		$sql="SELECT a.*,b.nama FROM ".$this->cuti." a INNER JOIN ".$this->pengguna." b ON a.nip=b.nip";
		$query=$this->db->query($sql);
		if ($query){
			return $query->result_array();
		}else{
			return $this->db->error();
		}
	}


	public function insertData($data){
		if ($this->db->insert($this->cuti,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}

	public function updateData($data,$nip){		
		$this->db->where("nip",$nip);

		if ($this->db->update($this->cuti,$data)){
            return array("code"=>0, "message"=>"");
		}else{
            return $this->db->error();
		}
	}
    
    public function checkvalid($nip,$aju,$awal,$akhir){
        $sql="UPDATE cuti SET status=1 WHERE nip=? AND tanggal_aju=? AND awal=? AND akhir=?";
		if ($this->db->query($sql,array($nip,$aju,$awal,$akhir))){
            return array("code"=>0, "message"=>"");
		}else{
			return $this->db->error();
		}

    }
}
?>