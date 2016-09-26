<?=($this->uri->segment(3)) ? anchor('material/delete/'.$material['id'],'x',array('class'=>'btn btn-warning btn-block','onclick'=>"return confirm('ท่านต้องการลบรายการนี้');")) : '';?>
<div class="module">
  <?=form_open_multipart(uri_string(),array('class'=>'form-vertical'));?>
  <?=($material) ? form_hidden('id',$material['id']) : '';?>
  <div class="module-head">
    <?=heading(($material) ? 'แก้ไขข้อมูลวัตถุดิบ' : 'เพิ่มข้อมูลวัตถุดิบ', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('คงเหลือ','',array('class'=>'span3'));?>
        <?=p($material['amount'],array('class'=>'span9'));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ชื่อรายการ','name',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'name','class'=>'span9','placeholder'=>'ชื่อรายการ'),set_value('name',$material['name']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ชื่อยี่ห้อ','brand',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'brand','class'=>'span9','placeholder'=>'ชื่อยี่ห้อ'),set_value('brand',$material['brand']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ขนาด','size',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'size','class'=>'span9','placeholder'=>'ขนาด'),set_value('size',$material['size']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('รายละเอียด','detail',array('class'=>'span3'));?>
        <?=form_textarea(array('name'=>'detail','class'=>'span9','placeholder'=>'รายละเอียด'),set_value('detail',$material['detail']));?>
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
        <?=img('assets/picture/'.$material['picture'],array('class'=>'img-responsive'));?>
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
