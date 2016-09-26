<div class="module module-login span4 offset4">
  <?=form_open(uri_string(),array('class'=>'form-vertical'));?>
  <div class="module-head">
    <?=heading('เข้าสู่ระบบ', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_input(array('name'=>'username','class'=>'span12','placeholder'=>'ชื่อผู้ใช้'),set_value('username'));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_password(array('name'=>'password','class'=>'span12', 'placeholder'=>'รหัสผ่าน'));?>
      </div>
    </div>
  </div>
  <div class="module-foot">
    <div class="control-group">
      <div class="controls clearfix">
        <?=form_submit('', 'เข้าสู่ระบบ', array('class'=>'btn btn-primary pull-right'));?>
      </div>
    </div>
    <?=form_close();?>
    <?=br().validation_errors('<div class="alert alert-warning">', '</div>');?>
  </div>
</div>
