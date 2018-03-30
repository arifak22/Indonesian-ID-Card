<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
     function __construct() {
        parent::__construct();
        //$this->crud->AksesMenu($this->uri->segment(1));
    }

	public function index()
	{
        if($this->session->userdata('level')==1){
            redirect('data_ktp');
        }else if($this->session->userdata('level')==2){
            redirect('view_data');
        }else{

        }
        
	}
}