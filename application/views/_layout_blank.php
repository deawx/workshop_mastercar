<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo doctype();?>
<html lang="en">
<head>
  <?php echo meta(array(
    array('name'=>'description','content'=>'mastercar clinic'),
    array('type'=>'equiv','name'=>'Content-type','content'=>'text/html; charset=utf-8'),
    array('name'=>'viewport','content'=>'width=device-width,initial-scale=1.0')
  ));?>
  <title><?php echo $title;?></title>
  <?php echo link_tag('assets/bootstrap/css/bootstrap.min.css');?>
  <?php echo link_tag('assets/bootstrap/css/bootstrap-responsive.min.css');?>
  <?php echo link_tag('assets/css/theme.css');?>
  <?php echo link_tag('assets/images/icons/css/font-awesome.css');?>
  <?php echo script_tag('assets/bootstrap/js/bootstrap.min.js');?>
</head>
<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <?php echo anchor('','<i class="icon-reorder shaded"></i>',array('class'=>'btn btn-navbar','data-toggle'=>'collapse','data-target'=>'.navbar-inverse-collapse'));?>
        <?php echo anchor('dashboard', $header, array('class'=>'brand'));?>
        <div class="nav-collapse collapse navbar-inverse-collapse">
          <?php echo ul(array(
            anchor('dashboard','<i class="menu-icon icon-home"></i> หน้าหลัก')
          ),array('class'=>'nav pull-right'));
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="container">
      <?php $this->load->view('_partials/_message'); ?>
      <div class="row">
        <div class="content">
          <?php echo $content;?>
        </div> <!--/.content-->
      </div> <!--/.row-->
    </div> <!--/.container-->
  </div> <!--/.wrapper-->
  <div class="footer">
    <div class="container">
      <b class="copyright"> &copy; 2015 - <?php echo date('Y');?> <?php echo $footer;?> </b>All rights reserved.
    </div> <!--/.container-->
  </div> <!--/.footer-->
</body>
</html>
