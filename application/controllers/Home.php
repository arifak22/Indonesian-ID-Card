<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	var $tabel = "anggota";
    var $folder = "ktp";
    var $pk = "id_anggota";
    var $title = "Anggota";

     function __construct() {
        parent::__construct();
        //$this->crud->AksesMenu($this->uri->segment(1));
    }

	public function index()
	{

        $data['data'] = "sad";
        //$data['title'] = $this->title;
        //menampilkan template
        $this->template->load('template', $this->folder.'/view', $data);
	}
}