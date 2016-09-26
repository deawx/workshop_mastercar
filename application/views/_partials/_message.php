<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $message = $this->session->flashdata(); ?>
<?php if ($message) : ?>
  <div class="alert alert-<?=$this->session->flashdata('class');?> alert-dismissible" role="alert">
    <?php echo form_button('','<span aria-hidden="true">&times;</span>',array('class'=>'close','data-dismiss'=>'alert','aria-label'=>'Close')); ?>
    <strong>*</strong> <?=$this->session->flashdata('value');?>
  </div>
<?php endif; ?>
