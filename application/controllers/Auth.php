<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	var $tabel = "user";
	var $pk		= "username";
	function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
        
    }
    public function index(){
        redirect('auth/login');
    }
	public function login()
	{
        if($this->session->userdata('status')==md5(date('d-m-y').$this->session->userdata('last_login'))){
            redirect('welcome');
        }

		if(isset($_POST['submit'])){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$capt = $this->input->post('capt');
			$login=  $this->db->get_where($this->tabel,array('username'=>$username,'password'=>  md5($password)));
			if($login->num_rows()==1)
            {
                if(strtolower($this->session->userdata('mycaptcha'))==strtolower($capt)){

                $this->crud->UpdateData($this->tabel,array('last_login'=>  waktu()), 'username',$username);
            	$r=  $login->row_array();
                $data=array('level'=>$r['level'],
                            'nama'=>$r['nama'],
                            'last_login'=>$r['last_login'],
                            'gambar'=>'img.png',
                            'status'=>md5(date('d-m-y').$r['last_login']),
                            'username'=>$username);
                if($r['level']=='2'){
                    $aktivitas = "Melakukan Login ke System";
                    $this->crud->InsertAktivitas($username,$aktivitas,waktu());
                }
                $this->session->set_userdata($data); 
                redirect('welcome');
                }else{
                   $this->session->set_flashdata('pesan','Captcha yang anda masukan salah !!!');
                	redirect('auth/login');
                }
            }else{
                $this->session->set_flashdata('pesan','Username dan password tidak sesuai !!!');
               redirect('auth/login');
           }


		}else{
			$vals = array(
                'img_path'	 => './captimg/',
                'img_url'	 => base_url().'captimg/',
                'img_width'	 => 150,
                'img_height' => 50,
                'word'  => random_string('a', 6),
                'border' => 0, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
 
            // store image html code in a variable
            $data['image'] = $cap['image'];
 
            // store the captcha word in a session
           $this->session->set_userdata('mycaptcha', $cap['word']);
            $this->load->view('login',$data);
			}
		}
		

public function logout()
    {
        $this->session->sess_destroy();
        redirect($this->uri->segment(1));
    
    }
}