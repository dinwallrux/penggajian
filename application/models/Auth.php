<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model{
    private $pengguna='guru';
    
    public function cekLogin($username,$password){
        $sql="SELECT * FROM ".$this->pengguna." WHERE nip=? AND password=SHA1(?)";
        $query=$this->db->query($sql,array($username,$password));
        if ($query->num_rows()>0){
            return array("code"=>0, "message"=> "sukses", "content" => $query->result_array());
        }else{
            return array("code"=>8180,"message"=>"Invalid username or password");
        }
    }
}
?>