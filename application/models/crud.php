<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class crud extends CI_Model {


    public function GetTable($tabel) {
       return $data = $this->db->get($tabel)->result();
        
    }
    public function Get($tabel) {
       return $data = $this->db->get($tabel);
        
    }
    public function InsertAktivitas($username,$aktivitas,$waktu) {
        $data = array('username'=>$username,'aktivitas'=>$aktivitas,'waktu'=>$waktu);
        $res = $this->db->insert('aktivitas', $data);
    }
    public function upload_csv($filename){ // Load librari upload
        
        $config['upload_path'] = './assets/csv/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;
    
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function insert_multiple($tabel,$data){
        $this->db->insert_batch($tabel, $data);
    }
    public function jumlah($tabel,$select){
        $this->db->select_sum($select);
        return $query = $this->db->get($tabel);
    }
    public function GetTableOrder($tabel,$field,$order) {
        $this->db->order_by($field,$order);
         return $data =$this->db->get($tabel)->result();
    }
    public function GetSearch($tabel,$record,$value){
        $this->db->select($record);
        $this->db->where('1','1');
        foreach ($record as $key => $v) {
            $this->db->like($v['key'],$value, 'after');
        }
       
        return $data =$this->db->get($tabel)->num_rows();
    }
    public function getkab($id){
        $this->db->where('id',$id);
        $data =$this->db->get('regencies')->row();
        return ucwords(strtolower($data->name));
    }
    public function getkec($id){
        $this->db->where('id',$id);
        $data =$this->db->get('districts')->row();
        return ucwords(strtolower($data->name));
    }
    public function getdesa($id){
        $this->db->where('id',$id);
        $data =$this->db->get('villages')->row();
        return ucwords(strtolower($data->name));
    }
    public function GetData($tabel,$record,$order,$limit1,$limit2){

        $this->db->select($record);
        $this->db->where('1','1');
        $this->db->order_by($order);
        //$this->db->limit($limit1,$limit2);
        return $data =$this->db->get($tabel)->result_array();
    }
    public function GetWhereOrder($tabel,$field,$order,$pk,$id) {
        $this->db->order_by($field,$order);
        $this->db->where($pk,$id);
         return $data =$this->db->get($tabel)->result();
    }
    public  function getByID($tabel,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tabel);
    }

    public function GetQuery($tabel, $where) {
        $this->db->where($where);
        $data = $this->db->get($tabel);
        return $data;
    }

    public function InsertData($tabel, $data) {
        $res = $this->db->insert($tabel, $data);
        return $res;
    }
    public function InsertKas($data) {
        $res = $this->db->insert('kas', $data);
        return $res;
    }

    public function UpdateData($tabel, $data, $pk, $id) {
        $this->db->where($pk,$id);
        $res = $this->db->update($tabel,$data);
        return $res;
    }
    public function UpdateSaldo($data,$id) {
        $this->db->where('id_anggota',$id);
        $res = $this->db->update('anggota',$data);
        return $res;
    }

    public function DeleteData($tabel, $pk, $id) {
        $this->db->where($pk,$id);
        $res = $this->db->delete($tabel);
        return $res;
    }
    public function SpesialDelete($tabel, $pk, $id) {
        $this->db->where_not_in($pk, $id);
        $res = $this->db->delete($tabel);
        return $res;
    }


    public function CountQuery($tabel, $where = "") {
        $this->db->where($where);
        $count = $this->db->get($tabel)->num_rows();
        return $count;
    }

    public function log($tabel,$aksi,$pk){
        $data=array('username'=>$this->session->userdata('username'), 'waktu'=>waktu(), 'action'=>$aksi,'tabel'=>$tabel,'pk'=>$pk);
        $res = $this->db->insert('log', $data);
         $res;
    }

    public function CountAll($tabel) {
        $count = $this->db->get($tabel)->num_rows();
        return $count;
    }
    public function Relasi($tabel, $where,$baris=""){
        $l=$this->db->get_where($tabel,$where);

                            $k=$l->row($baris);
                    
        return $k;
    }
    public function cari($tabel,$query,$value){
        $this->db->from($tabel);
        $this->db->join('tingkat','anggota.id_tingkat=tingkat.id_tingkat');
        $this->db->join('departemen','anggota.id_departemen=departemen.id_departemen');
        $this->db->like($query,$value);
        $res = $this->db->get();
        return $res;
    }
    public function JoinTabel($tabel1,$record,$tabel2,$fk){
        $this->db->select($record);
        $this->db->from($tabel1);
        $this->db->join($tabel2,$fk);
        $res = $this->db->get();
        return $res;
    }
    public function JoinTabell($tabel1,$record,$tabel2){
        $this->db->select($record);
        $this->db->from($tabel1);
        foreach ($tabel2 as $t) {
            $this->db->join($t['tabel'],$t['fk']);
        }
        //$this->db->join($tabel2,$fk);
        $res = $this->db->get();
        return $res;
    }
    public function JoinTabellWhere($tabel1,$record,$tabel2,$where){
        $this->db->select($record);
        $this->db->from($tabel1);
        foreach ($tabel2 as $t) {
            $this->db->join($t['tabel'],$t['fk']);
        }
        //$this->db->join($tabel2,$fk);
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }
    public function JoinTabelWhere($tabel1,$select,$tabel2,$fk,$where){
        $this->db->select($select);
        $this->db->from($tabel1);
        
        $this->db->join($tabel2, $fk);
        $this->db->where($where);
        $res = $this->db->get();
        return $res;

// Produces:
// SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    }

    
    public function SelectTabel($tabel,$select,$pk=null,$id=null){
        $this->db->select($select);
        $this->db->from($tabel);
        $this->db->where($pk,$id);
        $res = $this->db->get();
        return $res;
    }
    public function SelectTabel2($tabel,$select,$pk,$id,$pk2,$id2){
        $this->db->select($select);
        $this->db->from($tabel);
        $this->db->where($pk,$id);
        $this->db->where($pk2,$id2);
        $res = $this->db->get();
        return $res;
    }
    public function Menu($sess){
        $this->db->select(array('1'=>'nama_menu','2'=>'link','3'=>'status','4'=>'icon','5'=>'level','6'=>'app_menu.id_menu'));
        $this->db->from('app_menu');
        $this->db->where(array('level'=>$sess,'status'=>'Y'));
        $this->db->order_by('app_menu.id_menu', 'ASC');
        $res = $this->db->get();
        return $res;
    }
        public function Submenu($sess,$param){
        $this->db->select(array('1'=>'nama_submenu','2'=>'app_submenu.link','3'=>'app_submenu.status','4'=>'id_level','5'=>'app_submenu.id_submenu'));
        $this->db->from('app_submenu');
        $this->db->join('app_menu', 'app_menu.id_menu = app_submenu.id_menu');
        $this->db->where(array('app_submenu.id_menu'=>$param,'app_submenu.status'=>'Y'));
        $this->db->join('app_akses', 'app_akses.id_submenu = app_submenu.id_submenu');
        $this->db->where(array('id_level'=>$sess,'app_submenu.status'=>'Y'));
        $this->db->order_by('app_submenu.id_submenu', 'ASC');
        $res = $this->db->get();
        return $res;
    }
    public function AksesMenu($uri){
        $l=$this->session->userdata('level');
        if(isset($l)){
            $this->db->where(array('link'=>$uri));
            $res = $this->db->get('app_submenu');
            if($res->num_rows() >= 1){
                $ceksub= $res->result_array();
                $this->db->where(array('id_menu' => $ceksub[0]['id_menu']));
                $menu = $this->db->get('app_menu')->result_array();
                $this->db->where(array('level'=>$l,'id_menu'=>$menu[0]['id_menu']));
                $resmenu = $this->db->get('app_menu');
                if($resmenu->num_rows() >= 1){

                }else{
                    redirect('forbidden');
                }
            }else{
                $this->db->where(array('link'=>$uri));
                $cekmenu= $this->db->get('app_menu')->result_array();
                $this->db->where(array('level'=>$l,'id_menu'=>$cekmenu[0]['id_menu']));
                $cekhasil = $this->db->get('app_menu');
                if($cekhasil->num_rows() >=1){

                }else{
                   redirect('forbidden');
                }
            }
}else{
    redirect('auth');
}
    }
    public function ButCreate(){
    $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if($r['C']==1){
        $t=base_url() . $this->uri->segment('1');
             return"
             <div class='btn-group'>                                   
            <a href='$t/insert' class='btn sbold green'> 
            Tambah
            <i class='fa fa-plus'></i>
            </a>
            </div>";
            }else{
            
            }
        }
    public function ButCreate2($q){
    $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if($r['C']==1){
        $t=base_url() . $this->uri->segment('1');
             return"
             <div class='btn-group'>                                   
            <a href='$t/insertsub/$q' class='btn sbold green'> 
            Tambah
            <i class='fa fa-plus'></i>
            </a>
            </div>";
            }else{
            
            }
        }
    public function AksesCreate(){
        $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if(!$r['C']==1){
        $t=base_url() . $this->uri->segment('1');
             return redirect('welcome');
            }else{
            
            }

    }
    public function ButUpdate($param){
    $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if($r['U']==1){
        $t=base_url().''.$this->uri->segment(1).'/edit/'.$param;
             return"<a href='$t'  class='btn green'> Edit 
            <i class='fa fa-pencil'></i>
            </a>";
            
            }else{
            
            }
        }
        public function ButUpdatee($param){
    $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if($r['U']==1){
        $t=base_url().''.$this->uri->segment(1).'/edit/'.$param;
             return"<a href='$t'  class='btn btn-warning'> Edit 
            <i class='fa fa-pencil'></i>
            </a>";
            
            }else{
            
            }
        }
        public function ButUpdate2($param){
    $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if($r['U']==1){
        $t=base_url().''.$this->uri->segment(1).'/editsub/'.$param;
             return"<a href='$t'  class='btn green'> Edit 
            <i class='fa fa-pencil'></i>
            </a>";
            
            }else{
            
            }
        }
    public function AksesUpdate(){
        $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if(!$r['U']==1){
        $t=base_url() . $this->uri->segment('1');
             return redirect('welcome');
            }else{
            
            }

    }
    public function ButDelete($param){
    $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if($r['D']==1){
             return"
            <a href='#delete$param' data-toggle='modal'  class='btn red'> Hapus
            <i class='fa fa-times'></i>
            </a>
            ";
            
            }else{
            
            }
        }
    public function kosongkan(){
    $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if($r['D']==1){
             return"
            <a href='#delete' data-toggle='modal'  class='btn red'> kosongkan
            <i class='fa fa-times'></i>
            </a>
            ";
            
            }else{
            
            }
        }
        public function modalnotif($param){
            $t=base_url().''.$this->uri->segment(1).'/delete/'.$param;
            echo" <div class='modal fade' id='delete$param' tabindex='-1' role='basic' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                                    <h4 class='modal-title'>Peringatan</h4>
                                                </div>
                                                <div class='modal-body'> Apakah anda yakin untuk menghapus data ini ? </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn dark btn-outline' data-dismiss='modal'>Close</button>
                                                    
                                                    <a href='$t' class='btn green'>Hapus</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        </div>";
        }
        public function ButDelete2(){
    $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if($r['D']==1){
             return"
            <a href='#delete2' data-toggle='modal'  class='btn red'> Hapus
            <i class='fa fa-times'></i>
            </a>";
            
            }else{
            
            }
        }
        public function modalnotif2($param){
            $t=base_url().''.$this->uri->segment(1).'/deletesub/'.$param;
            echo" <div class='modal fade' id='delete2' tabindex='-1' role='basic' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                                    <h4 class='modal-title'>Peringatan</h4>
                                                </div>
                                                <div class='modal-body'> Apakah anda yakin untuk menghapus data ini ? </div>
                                                <div class='modal-footer'>
                                                <form action='$t' method='POST'>
                                                    <button type='button' class='btn dark btn-outline' data-dismiss='modal'>Close</button>
                                                    
                                                    <button type='submit' class='btn green'>Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        </div>";
        }
    public function AksesDelete(){
        $r=$this->db->get_where('app_level',array('id_level'=>$this->session->userdata('id_level')))->row_array();
    if(!$r['D']==1){
        $t=base_url() . $this->uri->segment('1');
             return redirect('welcome');
            }else{
            
            }

    }

}
