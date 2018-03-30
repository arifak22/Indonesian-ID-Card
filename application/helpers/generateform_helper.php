<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



if (!function_exists('generatehtml')) {

    function hidden($id, $value){
        echo"<input type='hidden' name='$id' value='$value'>";
    }
    function hiddenid($id, $value,$tag){
        echo"<input type='hidden' name='$id' value='$value'>";
    }
    function inputan($label,$class, $type, $name, $value, $required) {
        if($required == 1){
            $hasil="required='required'";
        }else if($required == 2){
            $hasil='disabled';
        }else if($required == 3){
            $hasil="readOnly='true'";
        }else{
            $hasil='';
        }
            echo"
            <div class='form-group'>
                        <label class='col-md-4 control-label'>" . ucwords($label) . "</label>
                        <div class='$class'>
                            <input type='$type' name='$name' placeholder='Masukan ".ucwords($label)."' class='form-control' value='$value' $hasil autocomplete='off'/>
                        </div>
                    </div>
            ";
    }
    function inputanrtrw($label,$class, $type, $name, $value, $name2, $value2, $required) {
        if($required == 1){
            $hasil="required='required'";
        }else if($required == 2){
            $hasil='disabled';
        }else if($required == 3){
            $hasil="readOnly='true'";
        }else{
            $hasil='';
        }
            echo"
            <div class='form-group'>
                        <label class='col-md-4 control-label'>" . ucwords($label) . "</label>
                        <div class='$class'>
                            <input type='$type' name='$name' placeholder='Masukan RT' class='form-control' value='$value' $hasil autocomplete='off'/>
                        </div>
                        <div class='$class'>
                            <input type='$type' name='$name2' placeholder='Masukan RW' class='form-control' value='$value2' $hasil autocomplete='off'/>
                        </div>
                    </div>
            ";
    }
    function rupiah($label, $type, $class, $name, $value, $required){
        $t="'mask': ['999.999.999', '999999999']";
        if($required == 1){
            $hasil="required='required'";
        }else if($required == 2){
            $hasil='disabled';
        }else{
            $hasil='';
        }
        echo"
        <tr>
        <td width='150'>".ucwords($label)."</td>
        <td>
        <div class='$class'>
        <div class='input-group'>
        <div class='input-group-addon'>
            Rp.
        </div>
                      <input type='number'  name='$name' placeholder='".strtolower($label)."....' class='form-control' value='$value' $hasil>
                      </div>
                      </div>
                      </td>
                      </td>
                      ";
    }
    function rupiahid($label, $type, $class, $name, $value, $required,$id){
        $t="'mask': ['999.999.999', '999999999']";
        if($required == 1){
            $hasil="required='required'";
        }else if($required == 2){
            $hasil='disabled';
        }else{
            $hasil='';
        }
        echo"
        <tr>
        <td width='150'>".ucwords($label)."</td>
        <td>
        <div class='$class'>
        <div class='input-group'>
        <div class='input-group-addon'>
            Rp.
        </div>
                      <input type='$type' id='$id'  name='$name' placeholder='".strtolower($label)."....' class='form-control' value='$value' $hasil>
                      </div>
                      </div>
                      </td>
                      </td>
                      ";
    }
    function inputanid($label, $type, $class, $name, $value, $required,$id) {
        if($required == 1){
            $hasil="required='required'";
        }else if($required == 2){
            $hasil='disabled';
        }else{
            $hasil='';
        }
            echo"
            <tr>
                    <td width='150'>" . ucwords($label) . "</td>
                    <td>
                        <div class='$class'>
                    <input type='$type' name='$name' id='$id' placeholder='".strtolower($label)."....' class='form-control' value='$value' $hasil autocomplete='off'>
                        </div>
                    </td>
                    </tr>
            ";
    }
    
    function inputan2($label, $type, $class, $name1, $name2, $value1,$value2, $required) {
        $hasil = $required == 0 ? '' : "required='required'";
            echo"
            <tr>
                    <td width='150'>" . ucwords($label) . "</td>
                    <td>
                        <div class='$class'>
                    <input type='$type' name='$name1' placeholder='".strtolower($name1)."....' class='form-control' value='$value1' $hasil>
                        </div>
                        <div class='$class'>
                    <input type='$type' name='$name2' placeholder='".strtolower($name2)."....' class='form-control' value='$value2'>
                        </div>
                    </td>
                    </tr>
            ";

    }

    function pencarian(){
        echo "
        <div class='row'>
        <div class='col-sm-3'>
        <select name='kat' class='form-control'>
            <option value='nama'>nama</option>
            <option value='nama_tingkat'>tingkat</option>
            <option value='departemen'>departemen</option>
            </select>
        </div>
        <div class='col-sm-7'>
        <input type='text' class='form-control' name='cari'>
        </div>
        <div class='col-sm-2'>
         <input type='submit' name='submit' class='btn btn-primary btn-lg' value='cari'>
         </div>
         </div>
        ";
    }

    function selectan($label,$class, $name, $value, $required) {
        echo"
       <div class='form-group'>
            <label class='col-md-4 control-label'>" . ucwords($label) . "</label>
            <div class='$class'>
        <select name='$name' class='form-control'>";
        foreach ($value as $d) {
            $hasil = ucwords($d) == $required ? 'selected' : '';
        echo "<option value = '" . ucwords($d) . "' $hasil>" . ucwords($d) . "</option>";
            }
        echo "</select>
                </div>
                </div>";
    }
    function selectanid($label, $class, $name, $value, $required,$id) {
        echo"
        <tr>
        <td width='150'>" . ucwords($label) . "</td><td>
        <div class='$class'>
        <select name='$name' id='$id' class='form-control'>";
        foreach ($value as $d) {
            $hasil = ucwords($d) == $required ? 'selected' : '';
        echo "<option value = '" . ucwords($d) . "' $hasil>" . ucwords($d) . "</option>";
            }
        echo "</select>
                </div>
                </td>
                </tr>";
    }
    function selectanno($label, $class, $name, $value, $required) {
        echo"
        <tr>
        <td width='150'>" . ucwords($label) . "</td><td>
        <div class='$class'>
        <select name='$name' class='form-control'>";
        $no=0;
        foreach ($value as $d) {
            $hasil = ucwords($d) == $required ? 'selected' : '';
        echo "<option value = '" . ucwords($no) . "' $hasil>" . ucwords($d) . "</option>";
           $no++;
            }
        echo "</select>
                </div>
                </td>
                </tr>";
    }
    function selectanbid($label, $class, $name, $value, $required,$id) {
        echo"
        <tr>
        <td width='150' valign='center'>" . ucwords($label) . "</td><td>
        <div class='$class'>
        <select name='$name' id='$id' class='form-control'>";
        foreach ($value as $d) {
            $hasil = ucwords($d) == $required ? 'selected' : '';
        echo "<option value = '" . ucwords($d) . "' $hasil>" . ucwords($d) . "</option>";
            }
        echo "</select>
                </div>
                </td>
                </tr>";
    }
    function selectansid($class, $name, $value, $required,$id) {

        echo"
        <div class='$class'>
        <select name='$name' id='$id' class='form-control'>";
        $no=0;
        foreach ($value as $d) {
            
            $hasil = ucwords($d) == $required ? 'selected' : '';
        echo "<option value = '" . ucwords($no) . "' $hasil>" . ucwords($d) . "</option>";
        $no++;
            }
        echo "</select>
                </div>
                ";
    }

    function selectan_db($label, $class, $name, $tabel, $pk, $field, $required) {
        $CI = & get_instance();
        $CI->load->model('crud');
        $data = $CI->crud->GetTable($tabel);
        echo"
        <tr>
        <td width='150'>" . ucwords($label) . "</td><td>
        <div class='$class'>
        <select name='$name' class='form-control'>";
        foreach ($data as $d) {
            $hasil = $d->$pk == $required ? 'selected' : '';
            echo "<option value = '" . $d->$pk . "' $hasil>" . ucwords($d->$field) . "</option>";
        }
        echo "</select>
                </div>
                </td>
                </tr>";
    }
    function selectanttl($label, $name, $tabel, $pk, $field, $required,$name2,$value2) {
        $CI = & get_instance();
        $CI->load->model('crud');
        $data = $CI->crud->GetTable($tabel);
        echo"
        <div class='form-group'>
            <label class='col-md-4 control-label'>" . ucwords($label) . "</label>
            <div class='col-md-4'>
            <select name='$name' class='form-control select2'>
            ";
            foreach ($data as $d) {
            $hasil = $d->$pk == $required ? 'selected' : '';
            echo "<option value = '" . $d->$pk . "' $hasil>". ucwords($d->$field) . "</option>";
             }
            echo"
                </select>
            </div>
            <div class='col-md-4'>
            <input placeholder='Masukan Tanggal Lahir' class='form-control input-date-picker' type='text' name='$name2' value='$value2' autocomplete='off'>
            </div>
        </div>";
    }
    function selectan2db($label, $name, $tabel, $pk, $field, $required) {
        $CI = & get_instance();
        $CI->load->model('crud');
        $CI->db->where('regency_id','3374');
        $data = $CI->crud->GetTable($tabel);
        echo"
        <div class='form-group'>
            <label class='col-md-4 control-label'>" . ucwords($label) . "</label>
            <div class='col-md-4'>
            <select name='$name' id='$name' class='form-control'>
            ";
            foreach ($data as $d) {
            $hasil = $d->$pk == $required ? 'selected' : '';
            echo "<option value = '" . $d->$pk . "' $hasil>". ucwords($d->$field) . "</option>";
             }
            echo"
                </select>
            </div>
        </div>";
    }

    function selectdata($label,$class,$name,$id){
        echo"
        <tr>
            <td width='150'>" . ucwords($label) . "</td>
            <td>
            <div class='$class'>
            <select name='$name' id='$id' class='form-control'>
            </select>
            </div>
            </td>
            </tr>
                                        ";
    }

    function selectan_dbb($label, $class, $name, $tabel, $pk, $field,$field2, $required) {
        $CI = & get_instance();
        $CI->load->model('crud');
        $data = $CI->crud->GetTable($tabel);
        echo"
        <tr>
        <td width='150'>" . ucwords($label) . "</td><td>
        <div class='$class'>
        <select name='$name' class='form-control'>";
        foreach ($data as $d) {
            $hasil = $d->$pk == $required ? 'selected' : '';
            echo "<option value = '" . $d->$pk . "' $hasil>" . ucwords($d->$field)." - ".ucwords($d->$field2) . "</option>";
        }
        echo "</select>
                </div>
                </td>
                </tr>";
    }
    function selectan_dbid($label, $class, $name, $tabel, $pk, $field, $required,$id) {
        $CI = & get_instance();
        $CI->load->model('crud');
        $data = $CI->crud->GetTable($tabel);
        echo"
        <tr>
        <td width='150'>" . ucwords($label) . "</td><td>
        <div class='$class'>
        <select name='$name' id='$id' class='form-control'>";
        foreach ($data as $d) {
            $hasil = $d->$pk == $required ? 'selected' : '';
            echo "<option value = '" . $d->$pk . "' $hasil>" . ucwords($d->$field) . "</option>";
        }
        echo "</select>
                </div>
                </td>
                </tr>";
    }
    function selectan_dbon($name, $tabel, $pk, $field, $required) {
        $CI = & get_instance();
        $CI->load->model('crud');
        $data = $CI->crud->GetTable($tabel);
        echo"
        <select name='$name' class='form-control' onchange='this.form.submit();'>";
        foreach ($data as $d) {
            $hasil = $d->$pk == $required ? 'selected' : '';
            echo "<option value = '" . $d->$pk . "' $hasil>" . ucwords($d->$field) . "</option>";
        }
        echo "</select>";
    }

    function textarea($label,$class, $rows, $name,$value) {
        echo"
         <tr>
         <td width='150'>" . ucwords($label) . "</td>
        <td>
        <div class='$class'>
        <textarea class='form-control' rows ='$rows' name ='$name' placeholder = '".strtolower($label)."....'>$value</textarea>
        </div>
        </td>
        </tr>";
    }

    function radio($label, $name, $value,$required) {
        echo"<tr>
        <td width='150'>".ucwords($label)."</td>
        <td><div class='radio'>";
        foreach($value as $d){
             $hasil = ucwords($d) == $required ? 'checked' : '';
            echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
        <input type = 'radio' name = '$name' id = 'optionsRadios1' value = '$d' $hasil>".ucwords($d)."
        </label>&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        echo"</div></td>";
    }
    function submit($value){
        echo"
        <div class='form-group'>
            
            <div class='col-md-4'>
        <input type='submit' name='submit' class='btn btn-flat btn-primary btn-sm pull-right' value='$value'>
            </div>
            </div>";
    }
    function caption($label, $value){
        echo"<tr>
                    <td width='150'>" . ucwords($label) . "</td>
                    <td>$value</td>
                    </tr>";
    }
    function formfile($label,$name, $required){
         $hasil = $required == 0 ? '' : "required='required'";
        echo"
        <div class='form-group'>
            <label class='col-md-4 control-label'>" . ucwords($label) . "</label>
            <div class='col-md-8'>
                <input type='file' name='$name' id='$name' $hasil class='filestyle' data-buttonbefore='true'>
            </div>
        </div>";
    }
    function linkbutton($link,$class,$label,$icon){
        echo"<div class='btn-group'>                                   
              <a href='$link' class='btn sbold $class'> 
              $label
             <i class='$icon'></i>
             </a>
             </div>";
    }
    function setflashsukses($pk,$tabel){
            return "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    
                    Data ".strtoupper($pk)." berhasil dimasukan ke dalam tabel ".strtoupper($tabel).".
                  </div>";
    }
    function setflashgagal($info){
           return "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                   
                    Maaf, $info
                  </div>";
    }
    function setflashhapus($pk,$tabel){
            return "<div class='alert alert-warning alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    
                    Anda telah menghapus data ".strtoupper($pk)." dari tabel ".strtoupper($tabel)."  !!
                  </div>";
    }
    function setflashedit($pk,$tabel){
            return "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    
                    Anda telah mengubah data ".strtoupper($pk)." dari tabel ".strtoupper($tabel)."  !!
                  </div>";
    }
    function arsip1($arsip,$name){
            if($arsip=='0'){
                return "<div class='btn-group btn-group-xs btn-group-solid'>
                <a href='' class='btn green'>tambah</a>
                </div>";
            }else{
                return"
                <div class='btn-group btn-group-xs btn-group-solid'>
                   <a href='".base_url()."assets/memory/arsip/".$arsip."' class='btn green'>lihat</a>
                   <a href='' class='btn yellow'>edit</a>
                   <a href='".base_url()."/file_acara/deletep/".$arsip."' class='btn red'>hapus</a>
                </div>";
            }

    }
    function arsip($arsip,$name,$link,$pk){
            if($arsip=='0'){
                return "<div class='btn-group btn-group-xs btn-group-solid'>
                <a href='".base_url()."file_acara/insert".$link."/".$pk."' class='btn yellow'>tambah</a>
                </div>";
            }else{
                return"
                <div class='btn-group btn-group-xs btn-group-solid'>
                   <a href='".base_url()."assets/memory/arsip/".$arsip."' class='btn green'>lihat</a>
                   <a href='".base_url()."file_acara/delete".$link."/".$arsip."' class='btn red'>hapus</a>
                </div>";
            }

    }
    

function waktu()
       {
           date_default_timezone_set('Asia/Jakarta');
           return date("Y-m-d H:i:s");
       }
function tanggal()
       {
           date_default_timezone_set('Asia/Jakarta');
           return date("Y-m-d");
       }
function day()
       {
           date_default_timezone_set('Asia/Jakarta');
           return date("d");
       }
function jam(){
        date_default_timezone_set('Asia/Jakarta');
           return date("H:i:s");
}

function tgl_indo($tgl){
    date_default_timezone_set('Asia/Jakarta');
        $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;       
    }
function get_tgl($tgl){
    $tanggal = substr($tgl, 0,11);
    return $tanggal;
} 

function tglfull($tgl){
    date_default_timezone_set('Asia/Jakarta');
    $jam = substr($tgl, 11,8);
        $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun.' - '.$jam;       
    }   

function getBulan($bln){
                switch ($bln){
                    case 1: 
                        return "Januari";
                        break;
                    case 2:
                        return "Februari";
                        break;
                    case 3:
                        return "Maret";
                        break;
                    case 4:
                        return "April";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Juni";
                        break;
                    case 7:
                        return "Juli";
                        break;
                    case 8:
                        return "Agustus";
                        break;
                    case 9:
                        return "September";
                        break;
                    case 10:
                        return "Oktober";
                        break;
                    case 11:
                        return "November";
                        break;
                    case 12:
                        return "Desember";
                        break;
                }
            } 
function nik($tgl,$kecamatan){
            $tanggal = substr($tgl,8,2);
            $bulan = substr($tgl,5,2);
            $tahun = substr($tgl,2,2);
            $tanggal.$bulan.$tahun;      
            $kec = substr($kecamatan, -2);
            return $nik = "3367".$kec.$tanggal.$bulan.$tahun."0001";
}

function umur($birthday){
    // Convert Ke Date Time
    $biday = new DateTime($birthday);
    $today = new DateTime();
    
    $diff = $today->diff($biday);
    
    return $diff->y;
}

function random_string($type = 'alnum', $len = 8)
    {
        switch ($type)
        {
            case 'basic':
                return mt_rand();
            case 'a':
                switch ($type)
                {
                        case 'a':
                        $pool = '123456789abcdefghijklmnpqrstuvwxyz';
                        break;
                }
                return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
            case 'unique': // todo: remove in 3.1+
            case 'md5':
                return md5(uniqid(mt_rand()));
            case 'encrypt': // todo: remove in 3.1+
            case 'sha1':
                return sha1(uniqid(mt_rand(), TRUE));
        }
    }
}