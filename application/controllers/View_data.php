<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_data extends CI_Controller {
	var $tabel = "ktp";
    var $folder = "ktp-user";
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
        $nik = $data['data']['nik'];
        $aktivitas = "Melihat Detail Data KTP (NIK: $nik )";
        $this->crud->InsertAktivitas($this->session->userdata('username'),$aktivitas,waktu());
    }

    public function export_csv(){
        $aktivitas = "Export Data To .CSV";
        $this->crud->InsertAktivitas($this->session->userdata('username'),$aktivitas,waktu());
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
        $r = $data['data']->row_array();
        $nik = $r['nik'];
        $aktivitas = "Export Data To .PDF (NIK: $nik)";
        $this->crud->InsertAktivitas($this->session->userdata('username'),$aktivitas,waktu());
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
}