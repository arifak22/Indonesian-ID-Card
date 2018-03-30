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
                    <div class="col-md-12">
                        <div class="box-widget widget-module">
                            <div class="widget-container">
                                <div class=" widget-block">
                                <div class="task-comments">
                                    <?php
                                    foreach ($data as $r ) {
                                    ?>
                                    <div class="task-comments-list">
                                        <div class="task-comments-meta">
        
                                            <div class="ask-comment-intro">
                                                <span class="poster-name"><?=$r->username?></span> - 
                                                <span class="poster-tagline"><?=$r->aktivitas?></span>
                                                <div class="commnet-post-date">
                                                    <?=tglfull($r->waktu)?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php
                                }
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>