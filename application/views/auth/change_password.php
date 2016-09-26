<div class="module module-login span6 offset3">
  <?=form_open(uri_string(),array('class'=>'form-vertical'));?>
  <?=form_hidden(array('id'=>$id,'re_password'=>$password));?>
  <div class="module-head">
    <?=heading('แก้ไขข้อมูล รหัสผ่าน', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('รหัสผ่านเดิม','old_password',array('class'=>'span3'));?>
        <?=form_password(array('name'=>'old_password','class'=>'span9','placeholder'=>'รหัสผ่านเดิม'));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('รหัสผ่านใหม่','new_password',array('class'=>'span3'));?>
        <?=form_password(array('name'=>'new_password','class'=>'span9','placeholder'=>'รหัสผ่านใหม่'));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('รหัสผ่านใหม่(ยืนยัน)','new_password_confirm',array('class'=>'span3'));?>
        <?=form_password(array('name'=>'new_password_confirm','class'=>'span9','placeholder'=>'รหัสผ่านใหม่(ยืนยัน)'));?>
      </div>
    </div>
  </div>
  <div class="module-foot">
    <div class="control-group">
      <div class="controls clearfix">
        <?=form_submit('', 'ยืนยันการเปลี่ยนรหัสผ่าน', array('class'=>'btn btn-success')).br('2');?>
        <p class="text-info"><i> ** เมื่อทำการเปลี่ยนรหัสผ่านเสร็จสิ้น ระบบจะกลับสู่หน้าล็อกอินใหม่อีกครั้ง </i></p>
      </div>
    </div>
    <?=form_close();?>
    <?=br().validation_errors('<div class="alert alert-warning">', '</div>');?>
  </div>
</div>
