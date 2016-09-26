<div class="module module-login span4 offset4">
  <?=form_open(uri_string(),array('class'=>'form-vertical'));?>
  <?=form_hidden(array('id'=>$id,'re_username'=>$username));?>
  <div class="module-head">
    <?=heading('แก้ไขข้อมูล ทั่วไป', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ชื่อ-สกุล','fullname',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'fullname','class'=>'span9','placeholder'=>'ชื่อ - นามสกุล'),set_value('fullname',$fullname));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ชื่อผู้ใช้','username',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'username','class'=>'span9','placeholder'=>'ชื่อผู้ใช้'),set_value('username',$username));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ตำแหน่ง','role',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'role','class'=>'span9','placeholder'=>'ชื่อผู้ใช้','disabled'=>TRUE),set_value('role',$role));?>
      </div>
    </div>
  </div>
  <div class="module-foot">
    <div class="control-group">
      <div class="controls clearfix">
        <?=form_submit('', 'ยืนยัน', array('class'=>'btn btn-success'));?>
        <?=form_reset('', 'ยกเลิก', array('class'=>'btn btn-warning'));?>
      </div>
    </div>
    <?=form_close();?>
    <?=br().validation_errors('<div class="alert alert-warning">', '</div>');?>
  </div>
</div>
