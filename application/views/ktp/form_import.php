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
                        <li class="active-page">Import</li>
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
                                    <div class="page-header">
                                        <h2>Import Data KTP</h2>
                                        <a href="<?=base_url()?>assets/csv/format.csv" class="btn btn-flat btn-default btn-sm">Download Format CSV</a>
                                    </div>
                                    <form class="form-horizontal" action="<?php echo base_url() . $this->uri->segment('1') ?>/import" method="post" enctype="multipart/form-data">
                                        <?=formfile('File CSV.','file',1 )?>
                                        <?=submit('import')?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
</div>
</div>