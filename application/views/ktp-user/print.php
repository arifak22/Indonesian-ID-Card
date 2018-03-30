<html>
<head>
	<title>Cetak PDF</title>
    <style>
    table {
        border-collapse: collapse;
    }
    td{
        padding: 10px;
    }
    </style>
</head>
<body>

<h1 style="text-align: center;">PROVINSI JAWA TENGAH</h1>
<h2 style="text-align: center;">KOTA SEMARANG</h2>
<hr>


<?php
if ($data->num_rows()>=1) {
    $r = $data->row_array();
    ?>
<table border="1" align="center">
                    <tr>
                        <td >
                            NIK
                        </td>
                        <td >
                            :
                        </td>
                        <td >
                            <?=$r['nik']?>
                        </td>
                        <td rowspan="13">
                            <img width="150px" src="<?=base_url().'assets/images/foto/'.$r['gambar']?>">
                        </td>
                    </tr>
                    <tr>
                                        
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?=$r['nama']?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Tempat, Tgl Lahir</td>
                                        <td>:</td>
                                        <td><?=$this->crud->getkab($r['tempat'])?>, <?=tgl_indo($r['tanggal_lahir'])?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Umur</td>
                                        <td>:</td>
                                        <td><?=umur($r['tanggal_lahir'])?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Golongan Darah</td>
                                        <td>:</td>
                                        <td><?=$r['gol_darah']?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?=$r['alamat']?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td align="right">RT/RW</td>
                                        <td>:</td>
                                        <td><?=$r['rt']?> / <?=$r['rw']?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td align="right">Kecamatan</td>
                                        <td>:</td>
                                        <td><?=$this->crud->getkec($r['kecamatan'])?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td align="right">Kelurahan</td>
                                        <td>:</td>
                                        <td><?=$this->crud->getdesa($r['kelurahan'])?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td><?=$r['agama']?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><?=$r['status']?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Pekerjaan</td>
                                        <td>:</td>
                                        <td><?=$r['pekerjaan']?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Kewarganegaraan</td>
                                        <td>:</td>
                                        <td><?=$r['kewarganegaraan']?></td>
                                    </tr>
</table>
<?php
}else{
    echo"<h3>Tidak ada Laporan</h3>";
}
?>
</body>
</html>
