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
                        <li class="active-page"> Edit</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
        </div>
    </div>
</div>
    <!-- Title End Here -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>

    <script type="text/javascript">
     $(document).ready(function() {
       loadkelurahan();
        });
     $(document).ready(function() {
      $("#kecamatan").change(function() {
       loadkelurahan();
      });
        });
    function loadkelurahan(){
      var strcari =$("#kecamatan").val();
      var strpk =$("#pkkelurahan").val();
       if (strcari != "")
       {
        $.ajax({
          type: "POST",
         url:"<?php echo base_url();?>data_ktp/tampilkelurahan",
         data:"r="+ strpk+"&q="+ strcari,
         success: function(data){
          $("#kelurahan").html(data);
         }
        });
       }
    }
    </script>
    <div class="box-widget widget-module">
        <div class="widget-head clearfix">
            <span class="h-icon"><i class="fa fa-slack"></i></span>
            <h4>Masukan Data</h4>
        </div>
        <div class="widget-container">
            <div class=" widget-block">
                 <?= $this->session->flashdata('pesan');?>.
   
             
                <form class="form-horizontal" action="<?php echo base_url() . $this->uri->segment('1') ?>/edit" method="post" enctype="multipart/form-data">
                  <?=hidden('id',$r['id'])?>
                    <?=inputan('NIK','col-md-8', 'text', 'nik', $r['nik'], 3)?>
                    <?=inputan('Nama','col-md-8', 'text', 'nama', $r['nama'], 1)?>
                    <?=selectanttl('Tempat', 'tempat', 'regencies', 'id', 'name', $r['tempat'],'tgl',$r['tanggal_lahir'])?>
                    <?=selectan('Golongan Darah','col-md-4', 'gol_darah',array('A','B','AB','O'), $r['gol_darah']);?>
                    <?=inputan('Alamat','col-md-8', 'text', 'alamat', $r['alamat'], 1)?>
                    <?=inputanrtrw('RT/RW','col-md-4', 'number', 'rt', $r['rt'], 'rw', $r['rw'], 1)?>
                    <?=selectan2db('Kecamatan', 'kecamatan', 'districts', 'id', 'name', $r['kecamatan'])?>
                    <input type="hidden" id="pkkelurahan" value="<?=$r['kelurahan']?>">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kelurahan/Desa</label>
                        <div class="col-md-4">
                            <select name='kelurahan' id="kelurahan" class='form-control' >
                            </select>
                        </div>
                    </div>
                    <?=selectan('Agama','col-md-8', 'agama',array('islam','kristen','katolik','budha','hindu','konghucu'), $r['agama']);?>
                    <?=selectan('Status','col-md-8', 'status',array('kawin', 'belum kawin'), $r['status']);?>
                    <?=inputan('Pekerjaan','col-md-8', 'text', 'pekerjaan', $r['pekerjaan'], 1)?>
                    <?=selectan('Kewarganegaraan','col-md-8', 'kewarganegaraan',array('WNI', 'WNA'), $r['kewarganegaraan']);?>
                    <?=formfile('Foto','gambar',0 )?>
                    <?=submit('simpan')?>

                </form>
            </div>
        </div>
    </div>
    

    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script>
     $('.input-date-picker').datepicker({
            format: 'yyyy-mm-dd',
        })
 </script>
</div>
</div>