<div class="main-container">
<div class="container-fluid">
    <!-- Title Start Here -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-md-7">
            <div class="page-breadcrumb-wrap">

                <div class="page-breadcrumb-info">
                    <h2 class="breadcrumb-titles"><?=$title?></h2>
                    <ul class="list-page-breadcrumb">
                        <li><a href="<?php echo base_url();?>welcome">Home</a>
                        </li>
                        <li><a href="<?php echo base_url().$this->uri->segment(1);?>"> <?=$title?></a></li>
                        <li class="active-page"> Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
        </div>
    </div>
</div>
    <!-- Title End Here -->

    

    <!-- Contents Start Here -->
                    <div class="col-md-12">
                        <div class="box-widget widget-module">
                            <div class="widget-container">
                                <div class=" widget-block">
                                    <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td width="25%"></td>
                                        <td width="20%">NIK</td>
                                        <td width="10%">:</td>
                                        <td width="45%"><?=$data['nik']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?=$data['nama']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tempat, Tgl Lahir</td>
                                        <td>:</td>
                                        <td><?=$this->crud->getkab($data['tempat'])?>, <?=tgl_indo($data['tanggal_lahir'])?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Umur</td>
                                        <td>:</td>
                                        <td><?=umur($data['tanggal_lahir'])?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Golongan Darah</td>
                                        <td>:</td>
                                        <td><?=$data['gol_darah']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?=$data['alamat']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td align="right">RT/RW</td>
                                        <td>:</td>
                                        <td><?=$data['rt']?> / <?=$data['rw']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td align="right">Kecamatan</td>
                                        <td>:</td>
                                        <td><?=$this->crud->getkec($data['kecamatan'])?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td align="right">Kelurahan</td>
                                        <td>:</td>
                                        <td><?=$this->crud->getdesa($data['kelurahan'])?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td><?=$data['agama']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><?=$data['status']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Pekerjaan</td>
                                        <td>:</td>
                                        <td><?=$data['pekerjaan']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Kewarganegaraan</td>
                                        <td>:</td>
                                        <td><?=$data['kewarganegaraan']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Foto</td>
                                        <td>:</td>
                                        <td><img width="200px" src="<?=base_url().'assets/images/foto/'.$data['gambar']?>"></td>
                                    </tr>

                                    </tbody>
                                    </table>
                                    <hr>
                                    <div class='row'>
            
                                        <div class='col-md-12'>
                                            <div class='col-md-4'>
                                            </div>
                                            <div class='col-md-4'>
                                                 <a href="<?=base_url().$this->uri->segment(1)."/export_pdf/".$data['id']?>" class='btn btn-flat btn-primary btn-sm pull-right'> Export PDF</a>

                                            </div>
                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
</div>
</div>