<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas_user extends CI_Controller {
	var $tabel = "aktivitas";
    var $folder = "aktivitas";
    var $pk = "id";
    var $title = "Aktivitas User";

     function __construct() {
        parent::__construct();
        $this->crud->AksesMenu($this->uri->segment(1));
    }
    public function index(){
    	 $data['title'] = $this->title;
    	 $data['data'] = $this->crud->GetTable($this->tabel);
        //menampilkan template
        $this->template->load('template', $this->folder.'/view', $data);
    }
}