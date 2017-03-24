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
  <?php echo link_tag('assets/scripts/datepicker/bootstrap.datepicker.min.css');?>
  <?php echo script_tag('assets/scripts/jquery-1.9.1.min.js');?>
  <?php echo script_tag('assets/scripts/jquery-ui-1.10.1.custom.min.js');?>
  <?php echo script_tag('assets/bootstrap/js/bootstrap.min.js');?>
  <?php echo script_tag('assets/scripts/datatables/jquery.dataTables.js');?>
  <?php echo script_tag('assets/scripts/datepicker/bootstrap.datepicker.min.js');?>
  <?php echo script_tag('assets/scripts/datepicker/bootstrap.datepicker.th.min.js');?>
  <?php echo script_tag('assets/scripts/common.js');?>
  <style media="screen">
    .sidebar a {
      font-weight: bolder;
      color: brown !important;
    }
  </style>
</head>
<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <?php echo anchor('','<i class="icon-reorder shaded"></i>',array('class'=>'btn btn-navbar','data-toggle'=>'collapse','data-target'=>'.navbar-inverse-collapse'));?>
        <?php echo anchor('', $header, array('class'=>'brand'));?>
        <?php $this->load->view('_partials/_navbar'); ?>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="span3">
          <div class="sidebar">
            <?php
            echo ul(array(
              anchor('dashboard','<i class="menu-icon icon-dashboard"></i> หน้าหลัก')
            ),array('class'=>'widget widget-menu unstyled'));
            echo ul(array(
              anchor('customer','<i class="menu-icon icon-group"></i> ผู้ใช้บริการ'),
              anchor('car','<i class="menu-icon icon-truck"></i> ยานพาหนะ'),
              anchor('material','<i class="menu-icon icon-cogs"></i> วัสดุ/อะไหล่')
            ),array('class'=>'widget widget-menu unstyled'));
            echo ul(array(
              anchor('#togglePages','<i class="menu-icon icon-bar-chart"></i></i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i> รายงาน',array('class'=>'collapsed','data-toggle'=>'collapse')).
              ul(array(
                anchor('report/activity','รายงานบริการ'),
                anchor('report/material','รายงานวัสดุ/อะไหล่')
              ),array('class'=>'collapse unstyled','id'=>'togglePages'))
            ),array('class'=>'widget widget-menu unstyled'));
            ?>
          </div> <!--/.sidebar-->
        </div> <!--/.span3-->
        <div class="span9">
          <?php $this->load->view('_partials/_message'); ?>
          <div class="content">
            <?php echo $content;?>
          </div> <!--/.content-->
        </div> <!--/.span9-->
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
