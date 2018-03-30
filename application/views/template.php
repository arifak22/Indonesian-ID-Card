<?php
if($this->session->userdata('status')==md5(date('d-m-y').$this->session->userdata('last_login'))){
  ?>
<!doctype html>
<html>

<!-- Mirrored from www.lab.westilian.com/matmix-admin/list-view/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Mar 2018 11:45:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KTP Online">
    <meta name="author" content="Arif Kurniawan">
    <title>KTP Online</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/waves.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/layout.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/components.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/common-styles.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pages.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatable.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matmix-iconfont.css" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="page-container list-menu-view">
<!--Leftbar Start Here -->
<div class="left-aside desktop-view">
    <div class="aside-branding">
       <!--  <a href="index.html" class="iconic-logo"><img src="images/logo-iconic.png" alt="Matmix Logo">
        </a>
        <a href="index.html" class="large-logo"><img src="images/logo-large.png" alt="Matmix Logo">
        </a> --><span class="aside-pin waves-effect"><i class="fa fa-thumb-tack"></i></span>
        <span class="aside-close waves-effect"><i class="fa fa-times"></i></span>
    </div>
    <div class="left-navigation">
        <ul class="list-accordion">
            <?php
                            //$menu=$this->db->get_where("menu",array('status'=>'y'))->result();
                            $this->db->order_by('orderid','ASC');
                            $menu = $this->crud->Menu($this->session->userdata('level'))->result();
                            foreach ($menu as $m) {
                                $submenu = $this->crud->GetQuery('app_submenu',array('id_menu'=>$m->id_menu));
                                if ($submenu->num_rows() > 0) {
                                    echo" 
                                    <li><a href='#' class='waves-effect'><span class='nav-icon'><i class='" . $m->icon . "'></i></span><span class='nav-label'>" . ucwords($m->nama_menu) . "</span></a>
                                    <ul>";
                                    foreach ($submenu->result() as $sm) {
                                        echo"
                                        <li><a href='" . base_url() . "" . $sm->link . "'>" . ucwords($sm->nama_submenu) . "</a>
                                         </li>";
                                    }
                                    echo"</ul></li>";
                                } else {
                                    echo"
                                    <li><a href='" . base_url() . "" . $m->link . "'><span class='nav-icon'><i class='" . $m->icon . "'></i></span><span class='nav-label'>" . ucwords($m->nama_menu) . "</span></a>
                                    </li>";
                                }
                            }
                            ?>
        </ul>
    </div>
</div>
<div class="page-content">
<!--Topbar Start Here -->
<header class="top-bar">
    <div class="container-fluid top-nav">
        <div class="search-form search-bar">
            <form>
                <input name="searchbox" value="" placeholder="Search Topic..." class="search-input">
            </form>
            <span class="search-close waves-effect"><i class="ico-cross"></i></span>
        </div>
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-4 responsive-fix top-mid">

            </div>
            <div class="col-md-6 responsive-fix">
                <div class="top-aside-right">
                    <div class="user-nav">
                        <ul>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#" class="clearfix dropdown-toggle waves-effect waves-block waves-classic">
                                    <span class="user-info"><?php echo ucwords($this->session->userdata('nama'));?> <cite>
                                      <?php 
                                      $level= $this->session->userdata('level');
                                      if ($level=='1') {
                                        echo "As Admin";
                                      }else{
                                        echo "As User";
                                      }
                                      ?>
                                                
                                    </cite></span>
                                    
                                </a>
                                <ul role="menu" class="dropdown-menu fadeInUp">
                                    
                                    <li><a href="<?php echo base_url();?>auth/logout"><span class="user-nav-icon"><i class="fa fa-lock"></i></span><span class="user-nav-label">Logout</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</header>
<?php echo $contents?>
<!--Footer Start Here -->
<footer class="footer-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="footer-left">
                    <span>&copy; 2018 </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="footer-right">
                    <span class="footer-meta"><a href="http://sideveloper.com">Arif Kurniawan</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<script src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.loadmask.js"></script>
<script src="<?php echo base_url();?>assets/js/jRespond.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/nav-accordion.js"></script>
<script src="<?php echo base_url();?>assets/js/hoverintent.js"></script>
<script src="<?php echo base_url();?>assets/js/waves.js"></script>
<script src="<?php echo base_url();?>assets/js/hoverintent.js"></script>



<!--Data Tables Start Here-->

<script src="<?php echo base_url();?>assets/js/select2.js"></script>
<!--Data Tables End Here-->

<script src="<?php echo base_url();?>assets/js/select2.js"></script>
<script src="<?php echo base_url();?>assets/js/underscore.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.elastic.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.events.input.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.mentionsInput.js"></script>
<script src="<?php echo base_url();?>assets/js/summernote.min.js"></script>

<!--CHARTS-->
<script src="<?php echo base_url();?>assets/js/smart-resize.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.tagsinput.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.mask.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.bootstrap-touchspin.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-filestyle.js"></script>
<script src="<?php echo base_url();?>assets/js/selectize.js"></script>

<script src="<?php echo base_url();?>assets/js/layout.init.js"></script>

<script src="<?php echo base_url();?>assets/js/matmix.init.js"></script>
<script src="<?php echo base_url();?>assets/js/retina.min.js"></script>


</body>

<!-- Mirrored from www.lab.westilian.com/matmix-admin/list-view/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Mar 2018 11:46:20 GMT -->
</html>
<?php
}else{
  $this->session->set_flashdata('pesan','Anda harus login terlebih dahulu!!!');
  redirect('auth/login');
}
?>