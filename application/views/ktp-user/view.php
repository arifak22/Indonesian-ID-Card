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
                        <li class="active-page"> View</li>
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
                                    <?= $this->session->flashdata('pesan');?>
                                    <div class="page-header">
                                    
                                        <a href="<?=base_url().$this->uri->segment(1)?>/export_csv" class="btn btn-flat btn-primary btn-sm"><!-- <i class="fa fa-file-excel-o"></i> --> Export Data To CSV</a>
                                    </div>
                                    <table id="data" class="table dt-table">
                                    <thead>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>
                                            NIK
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Agama
                                        </th>
                                        <th>
                                            Pekerjaan
                                        </th>
                                        <th align="center">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>
                                            NIK
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Agama
                                        </th>
                                        <th>
                                            Pekerjaan
                                        </th>
                                        <th align="center">
                                            Action
                                        </th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    

                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Script to Get Data Start Here -->
                    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
                    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
                    <script type="text/javascript" language="javascript" >
                        $(document).ready(function() {
                            var dataTable = $('#data').DataTable( {
                                "processing": true,
                                "serverSide": true,
                                "order": [], 
                                "ajax":{
                                    url :"<?php echo base_url();?>view_data/view_data", // json datasource
                                    type: "post",  // method  , by default get
                                    error: function(){  // error handling
                                        $(".employee-grid-error").html("");
                                        $("#data").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                                        $("#data_processing").css("display","none");
                                        
                                    }
                                    
                                },
                                "columnDefs": [
                                    { 
                                        "targets": [ 0,5 ], 
                                        "orderable": false, 
                                    },
                                    ],
                            } );
                        } );
                    </script>

                    <!-- Script to Get Data Stop Here -->
</div>
</div>