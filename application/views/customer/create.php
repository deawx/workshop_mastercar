<?=($this->uri->segment(3)) ? anchor('customer/delete/'.$customer['id'],'x',array('class'=>'btn btn-warning btn-block','onclick'=>"return confirm('ท่านต้องการลบข้อมูลนี้หรือไม่');")) : '';?>
<div class="module">
  <?=form_open(uri_string(),array('class'=>'form-vertical'));?>
  <?=($customer) ? form_hidden('id',$customer['id']) : form_hidden('date_create',date('d/m/Y'));?>
  <div class="module-head">
    <?=heading(($customer) ? 'แก้ไขข้อมูลลูกค้า' : 'เพิ่มข้อมูลลูกค้า', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ชื่อ-นามสกุล','fullname',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'fullname','class'=>'span9','placeholder'=>'ชื่อ - นามสกุล'),set_value('fullname',$customer['fullname']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('หมายเลขบัตรประชาชน','card',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'card','class'=>'span9','placeholder'=>'หมายเลขบัตรประชาชน'),set_value('card',$customer['card']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('หมายเลขโทรศัพท์','phone',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'phone','class'=>'span9','placeholder'=>'หมายเลขโทรศัพท์'),set_value('phone',$customer['phone']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ที่อยู่อีเมล์','email',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'email','class'=>'span9','placeholder'=>'ที่อยู่อีเมล์'),set_value('email',$customer['email']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ที่อยู่','address',array('class'=>'span3'));?>
        <?=form_textarea(array('name'=>'address','class'=>'span9','placeholder'=>'ที่อยู่'),set_value('address',$customer['address']));?>
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
