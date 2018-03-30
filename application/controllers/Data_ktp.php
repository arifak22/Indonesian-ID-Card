<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ktp extends CI_Controller {
	var $tabel = "ktp";
    var $folder = "ktp";
    var $pk = "id";
    var $title = "Data KTP";
    var $filename = "import_data";

     function __construct() {
        parent::__construct();
        $this->crud->AksesMenu($this->uri->segment(1));
    }

	public function index()
    {

        $data['title'] = $this->title;
        //menampilkan template
        $this->template->load('template', $this->folder.'/view', $data);
    }
    public function detail()
    {   
        $id = $this->uri->segment(3);
        $data['data'] = $this->crud->getByID($this->tabel,$this->pk,$id)->row_array();
        $data['title'] = $this->title;
        //menampilkan template
        $this->template->load('template', $this->folder.'/detail', $data);
    }
    public function import(){
        $data = array();
        if(isset($_POST['submit']))
        {
            $upload = $this->crud->upload_csv($this->filename);
            if($upload['result'] == "success"){
                include APPPATH.'third_party/PHPExcel/PHPExcel.php';
                $csvreader = PHPExcel_IOFactory::createReader('CSV');
                $loadcsv = $csvreader->load('assets/csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
                $sheet = $loadcsv->getActiveSheet()->getRowIterator();
                
                // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
                $data = [];
                
                $numrow = 1;
                foreach($sheet as $row){
                    // Cek $numrow apakah lebih dari 1
                    // Artinya karena baris pertama adalah nama-nama kolom
                    // Jadi dilewat saja, tidak usah diimport
                    if($numrow > 1){
                        // START -->
                        // Skrip untuk mengambil value nya
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                        
                        $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
                        foreach ($cellIterator as $cell) {
                            array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
                        }
                        // <-- END
                        $nik = $get[0];
                        $nama  =   $get[1];
                        $tempat  =   $get[2];
                        $tgl  =   $get[3];
                        $gol_darah  =   $get[4];
                        $alamat  =   $get[5];
                        $rt  =   $get[6];
                        $rw  =   $get[7];
                        $kecamatan  =   $get[8];
                        $kelurahan  =   $get[9];
                        $agama  =   $get[10];
                        $status  =   $get[11];
                        $pekerjaan  =   $get[12];
                        $kewarganegaraan  =  $get[13];
                        $gambar  =  $get[14];
            
                    
                        
                        // Kita push (add) array data ke variabel data
                        array_push($data, [
                            'nik'=>$nik,'nama'=>$nama,'tempat'=>$tempat,'tanggal_lahir'=>$tgl,'gol_darah'=>$gol_darah,'alamat'=>$alamat,'rt'=>$rt,'rw'=>$rw,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'agama'=>$agama,'status'=>$status,'pekerjaan'=>$pekerjaan,'kewarganegaraan'=>$kewarganegaraan,'gambar'=>$gambar
                        ]);
                    }
                    
                    $numrow++; // Tambah 1 setiap kali looping
                }

                // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
                $this->crud->insert_multiple($this->tabel,$data);
                
                $this->session->set_flashdata('pesan',"<div class='alert alert-success' role='alert'><strong>Sukses!</strong> Data Berhasil Di Import.</div>", 'Info');
                redirect($this->uri->segment(1));
            }else{

            }

        }else{
            $data['title'] = $this->title;
            //menampilkan template
            $this->template->load('template', $this->folder.'/form_import', $data);
        }
        
    }

    public function export_csv(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Data_KTP.csv";
        $query = "SELECT `nik`, `nama`, `tempat`, `tanggal_lahir`, `gol_darah`, `alamat`, `rt`, `rw`, `kecamatan`, `kelurahan`, `agama`, `status`, `pekerjaan`, `kewarganegaraan`, `gambar` FROM `ktp`";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function export_pdf(){
        $id = $this->uri->segment(3);
        ob_start();
        $data['title'] = 'DATA KTP ';
        //$this->db->where_not_in('sisa','0');
        $query = "SELECT * FROM `ktp` WHERE id='$id'";
        $data['data'] = $this->db->query($query);
        $this->load->view($this->folder.'/print', $data);
        $html = ob_get_contents();
        ob_end_clean();
        require_once('assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data_KTP.pdf', 'D');
    }

    public function view_data(){
        $list = $this->ktp_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nik;
            $row[] = $field->nama;
            $row[] = $field->agama;
            $row[] = $field->pekerjaan;
            $row[] = "
                        <div class='btn-toolbar' role='toolbar'>
                                                    <div class='btn-group' role='group'>
                                                    <a href='".base_url().$this->uri->segment(1)."/detail/".$field->id."' class='btn btn-default btn-sm'>Detail</a>
                                                        <a href='".base_url().$this->uri->segment(1)."/edit/".$field->id."' class='btn btn-default btn-sm'>Edit</a>
                                                        <a href='".base_url().$this->uri->segment(1)."/delete/".$field->id."' class='btn btn-default btn-sm'>Delete</a>
                                                    </div>
                                                    <a href='".base_url().$this->uri->segment(1)."/export_pdf/".$field->id."' class='btn btn-primary btn-sm'>Export PDF</a>
                                                </div>
                    ";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ktp_model->count_all(),
            "recordsFiltered" => $this->ktp_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function insert(){
        if(isset($_POST['submit']))
        {
            $nama  =   $this->input->post('nama');
            $tempat  =   $this->input->post('tempat');
            $tgl  =   $this->input->post('tgl');
            $gol_darah  =   $this->input->post('gol_darah');
            $alamat  =   $this->input->post('alamat');
            $rt  =   $this->input->post('rt');
            $rw  =   $this->input->post('rw');
            $kecamatan  =   $this->input->post('kecamatan');
            $kelurahan  =   $this->input->post('kelurahan');
            $agama  =   $this->input->post('agama');
            $status  =   $this->input->post('status');
            $pekerjaan  =   $this->input->post('pekerjaan');
            $kewarganegaraan  =   $this->input->post('kewarganegaraan');
            $nik = nik($tgl,$kecamatan);
            //$ceknik = $this->crud->getByID($this->tabel,'nik',$nik)->num_rows();
            $config['upload_path'] = './assets/images/foto/'; 
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nik;  
            $config['overwrite'] = TRUE;
            $config['max_size'] = '2048';
            $this->upload->initialize($config);
            $foto = $_FILES['gambar']['name'];
            if($this->upload->do_upload('gambar')){
                $tp=$this->upload->data();
                $gambar = $tp['file_name'];
                $data = array('nik'=>$nik,'nama'=>$nama,'tempat'=>$tempat,'tanggal_lahir'=>$tgl,'gol_darah'=>$gol_darah,'alamat'=>$alamat,'rt'=>$rt,'rw'=>$rw,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'agama'=>$agama,'status'=>$status,'pekerjaan'=>$pekerjaan,'kewarganegaraan'=>$kewarganegaraan,'gambar'=>$gambar);
                $this->crud->InsertData($this->tabel,$data);
                $data['data'] = $data;
                $data['title'] = $this->title;
                $this->template->load('template', $this->folder.'/success', $data);
            }else{
                $this->session->set_flashdata('pesan',"<div class='alert alert-danger' role='alert'><strong>Gagal!</strong> Gambar mengalamai masalah (gif|jpg|jpeg|png and max 2MB) !!!.</div>", 'Info');
                redirect($this->uri->segment(1).'/insert');
            }
        }else{
            $data['title'] = $this->title;
            //menampilkan template
            $this->template->load('template', $this->folder.'/insert', $data);
        }
        
    }
    public function edit(){
        if(isset($_POST['submit']))
        {
            $id     = $this->input->post('id');
            $nama  =   $this->input->post('nama');
            $tempat  =   $this->input->post('tempat');
            $tgl  =   $this->input->post('tgl');
            $gol_darah  =   $this->input->post('gol_darah');
            $alamat  =   $this->input->post('alamat');
            $rt  =   $this->input->post('rt');
            $rw  =   $this->input->post('rw');
            $kecamatan  =   $this->input->post('kecamatan');
            $kelurahan  =   $this->input->post('kelurahan');
            $agama  =   $this->input->post('agama');
            $status  =   $this->input->post('status');
            $pekerjaan  =   $this->input->post('pekerjaan');
            $kewarganegaraan  =   $this->input->post('kewarganegaraan');
            if($_FILES['gambar']['name'] != ''){
                $config['upload_path'] = './assets/images/foto/'; 
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['file_name'] = $nik;  
                $config['overwrite'] = TRUE;
                $config['max_size'] = '2048';
                $this->upload->initialize($config);
                $foto = $_FILES['gambar']['name'];
                if($this->upload->do_upload('gambar')){
                    $tp=$this->upload->data();
                    $gambar = $tp['file_name'];
                    $data = array('nama'=>$nama,'tempat'=>$tempat,'tanggal_lahir'=>$tgl,'gol_darah'=>$gol_darah,'alamat'=>$alamat,'rt'=>$rt,'rw'=>$rw,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'agama'=>$agama,'status'=>$status,'pekerjaan'=>$pekerjaan,'kewarganegaraan'=>$kewarganegaraan,'gambar'=>$gambar);
                    $this->crud->UpdateData($this->tabel,$data,$this->pk,$id);
                    $this->session->set_flashdata('pesan',"<div class='alert alert-success' role='alert'><strong>Sukses!</strong> Data Berhasil dirubah !!!.</div>", 'Info');
                    redirect($this->uri->segment(1));
                }else{
                    $this->session->set_flashdata('pesan',"<div class='alert alert-danger' role='alert'><strong>Gagal!</strong> Gambar mengalamai masalah (gif|jpg|jpeg|png and max 2MB) !!!.</div>", 'Info');
                    redirect($this->uri->segment(1).'/edit/'.$id);
                }
            }else{
                $data = array('nama'=>$nama,'tempat'=>$tempat,'tanggal_lahir'=>$tgl,'gol_darah'=>$gol_darah,'alamat'=>$alamat,'rt'=>$rt,'rw'=>$rw,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'agama'=>$agama,'status'=>$status,'pekerjaan'=>$pekerjaan,'kewarganegaraan'=>$kewarganegaraan);
                $this->crud->UpdateData($this->tabel,$data,$this->pk,$id);
                $this->session->set_flashdata('pesan',"<div class='alert alert-success' role='alert'><strong>Sukses!</strong> Data Berhasil dirubah !!!.</div>", 'Info');
                redirect($this->uri->segment(1));
            }
        }else{
            $data['title']=  $this->title;
            $id          =  $this->uri->segment(3);
            $data['r']   =  $this->crud->getByID($this->tabel,$this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
            
    }
    public function delete(){
        $id = $this->uri->segment(3);
        $r = $this->crud->getByID($this->tabel,$this->pk,$id)->row_array();
        $path= base_url().'assets/images/foto/'.$r['gambar_utama'];
        if($r['gambar_utama']=='img.png'){

        }else{
            unlink($path);
        }
        $this->crud->DeleteData($this->tabel,$this->pk,$id);
        $this->session->set_flashdata('pesan',"<div class='alert alert-success' role='alert'><strong>Sukses!</strong> Data berhasil dihapus !!!.</div>", 'Info');
        redirect($this->uri->segment(1));
    }
    public function tampilkelurahan(){
        $cari = $_POST['q'];
        if(isset($_POST['r'])){
        $p = $_POST['r'];
        $data = $this->crud->getByID('villages','district_id',$cari)->result_array();
        //print_r($data);
        foreach ($data as $d) {
           $hasil = $d['id'] == $p ? 'selected' : '';
            echo "<option value = '" . $d['id'] . "' $hasil>" . ucwords($d['name']) . "</option>";
        }
            }else{
        $data = $this->crud->getByID('villages','district_id',$cari)->result_array();
        //print_r($data);
        foreach ($data as $d) {
           
            echo "<option value = '" . $d['id'] . "'>" . ucwords($d['name']) . "</option>";
        }
        }        
    }
}