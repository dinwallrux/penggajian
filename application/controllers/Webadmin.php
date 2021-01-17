<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("auth");
    }

	public function index()
	{
	    $data=array(
	            "title"     =>  "SMA PGRI 1 Denpasar",
	        );
		$this->load->view('admin/login/index',$data);
	}
	

	public function memlogin()
	{
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('username', 'NIP', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error', validation_errors());
            redirect('/');
			return;
		}

	    $username = $this->security->xss_clean($this->input->post('username'));
	    $password = $this->security->xss_clean($this->input->post('password'));
	    $result=$this->auth->cekLogin($username,$password);
	    if ($result["message"]=="sukses"){
	        $data=array(
	                "username"=>$username,
	                "role"=>$result["content"][0]["role"],
	            );
	        $this->session->set_userdata("logged_in",$data);
			redirect('dashboard');
	    }else{
            $this->session->set_flashdata('error', $result["message"]);
            redirect('/');
	    }
	}


	public function memlogout(){
		$this->session->unset_userdata("logged_in");
		redirect('/');
	}

}
