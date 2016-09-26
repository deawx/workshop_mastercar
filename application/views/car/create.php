<?=($this->uri->segment(3)) ? anchor('car/delete/'.$car['id'],'x',array('class'=>'btn btn-warning btn-block','onclick'=>"return confirm('ท่านต้องการลบข้อมูลนี้หรือไม่');")) : '';?>
<div class="module">
  <?=form_open_multipart(uri_string(),array('class'=>'form-vertical'));?>
  <?=($car) ? form_hidden('id',$car['id']) : form_hidden('date_create',date('d/m/Y'));?>
  <div class="module-head">
    <?=heading(($car) ? 'แก้ไขข้อมูลยานพาหนะ' : 'เพิ่มข้อมูลยานพาหนะ', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ชื่อยี่ห้อ','name_brand',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'name_brand','class'=>'span9','placeholder'=>'ชื่อยี่ห้อ'),set_value('name_brand',$car['name_brand']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ชื่อรุ่น-รหัส','name_version',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'name_version','class'=>'span9','placeholder'=>'ชื่อรุ่น-รหัส'),set_value('phone',$car['name_version']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('หมายเลขทะเบียน','identity',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'identity','class'=>'span9','placeholder'=>'หมายเลขทะเบียน'),set_value('identity',$car['identity']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('รูปภาพ','picture',array('class'=>'span3'));?>
        <?=form_upload(array('name'=>'picture','class'=>'span9'));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('','',array('class'=>'span3'));?>
        <?=img('assets/picture/'.$car['picture'],array('class'=>'img-responsive'));?>
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
