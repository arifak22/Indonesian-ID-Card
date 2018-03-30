<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Restapi extends REST_Controller {
    var $tabel = "ktp";
    var $folder = "ktp";
    var $pk = "id";
    var $title = "Data KTP";

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get($this->tabel)->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get($this->tabel)->result();
        }
        $this->response($kontak, 200);
    }

    function index_post() {
                $nik = nik($this->post('tanggal_lahir'),$this->post('kecamatan'));
        $data = array(
                    'nik'=>$nik,
                    'nama'          => $this->post('nama'),
                    'tempat'          => $this->post('tempat'),
                    'tanggal_lahir'          => $this->post('tanggal_lahir'),
                    'gol_darah'          => $this->post('gol_darah'),
                    'alamat'          => $this->post('alamat'),
                    'rt'          => $this->post('rt'),
                    'rw'          => $this->post('rw'),
                    'kecamatan'          => $this->post('kecamatan'),
                    'kelurahan'          => $this->post('kelurahan'),
                    'agama'          => $this->post('agama'),
                    'status'          => $this->post('status'),
                    'pekerjaan'          => $this->post('pekerjaan'),
                    'kewarganegaraan'          => $this->post('kewarganegaraan'),
                    'gambar'    => $this->post('gambar'));
        $insert = $this->db->insert($this->tabel, $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'nama'          => $this->put('nama'),
                    'tempat'          => $this->put('tempat'),
                    'tanggal_lahir'          => $this->put('tanggal_lahir'),
                    'gol_darah'          => $this->put('gol_darah'),
                    'alamat'          => $this->put('alamat'),
                    'rt'          => $this->put('rt'),
                    'rw'          => $this->put('rw'),
                    'kecamatan'          => $this->put('kecamatan'),
                    'kelurahan'          => $this->put('kelurahan'),
                    'agama'          => $this->put('agama'),
                    'status'          => $this->put('status'),
                    'pekerjaan'          => $this->put('pekerjaan'),
                    'kewarganegaraan'          => $this->put('kewarganegaraan'),
                    'gambar'    => $this->put('gambar'));
        $this->db->where('id', $id);
        $update = $this->db->update($this->tabel, $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete($this->tabel);
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>