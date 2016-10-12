<?php
$category = $this->input->get('category') ? $this->input->get('category') : $activity['category'];
$disabled = ($activity) ? 'disabled' : '';
$materials = ($this->uri->segment(3)) ? $material_usage : $material;
?>
<!-- <?=($this->uri->segment(3)) ? anchor('dashboard/delete/'.$activity['id'],'x',array('class'=>'btn btn-warning btn-block','onclick'=>"return confirm('ท่านต้องการลบรายการนี้');")) : '';?> -->
<div class="module">
  <?=form_open(uri_string(),array('class'=>'form-vertical'));?>
  <?=($activity) ? form_hidden('id',$activity['id']) : form_hidden('date_create',date('d/m/Y'));?>
  <div class="module-head">
    <?=heading(($activity) ? 'แก้ไขข้อมูลการให้บริการ' : 'เพิ่มข้อมูลการให้บริการ', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ประเภทรายการ','category',array('class'=>'span3'));?>
        <?=form_dropdown(array('name'=>'category','required'=>TRUE,'onchange'=>"window.location='create?category='+this.value",$disabled=>TRUE),array('บันทึกจ่ายออก'=>'บันทึกจ่ายออก','บันทึกเก็บเข้า'=>'บันทึกเก็บเข้า'),set_value('category',$category));?>
      </div>
    </div>
    <?php if ( ! $category || $category === 'บันทึกจ่ายออก' || $activity['category'] === 'บันทึกจ่ายออก') : ?>
      <div class="control-group">
        <div class="controls row-fluid">
          <?=form_label('เลือกรายการผู้ใช้บริการ','customer_id',array('class'=>'span3'));?>
          <?=form_dropdown(array('name'=>'customer_id','required'=>TRUE),$customer,set_value('customer_id',$activity['customer_id']));?>
        </div>
      </div>
      <div class="control-group">
        <div class="controls row-fluid">
          <?=form_label('เลือกหมายเลขทะเบียนยานพาหนะ','car_id',array('class'=>'span3'));?>
          <?=form_dropdown(array('name'=>'car_id','required'=>TRUE),$car,set_value('car_id',$activity['car_id']));?>
        </div>
      </div>
    <?php endif; ?>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('หัวข้อการบริการ','title',array('class'=>'span3'));?>
        <?=form_input(array('name'=>'title','class'=>'span9','placeholder'=>'หัวข้อการบริการ','required'=>TRUE),set_value('title',$activity['title']));?>
      </div>
    </div>
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('รายละเอียดการบริการ','detail',array('class'=>'span3'));?>
        <?=form_textarea(array('name'=>'detail','class'=>'span9','placeholder'=>'รายละเอียดการบริการ','required'=>TRUE),set_value('detail',$activity['detail']));?>
      </div>
    </div>
  </div>

  <div class="module-head"> <?=heading('รายการวัสดุ/อะไหล่','3');?> </div>
  <div class="control-group">
    <div class="module-body table">
      <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
        <thead>
          <tr>
            <th>ที่</th>
            <th>ชื่อรายการ</th>
            <th>คงเหลือ</th>
            <th>จำนวน</th>
            <th>ราคา/หน่วย</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($materials as $_m => $m) : ?>
            <tr>
              <td><?=++$_m;?></td>
              <td><?=anchor('material/create/'.$m['id'],$m['name']);?></td>
              <th><?=($this->uri->segment(3))
                ? 'out of stock'
                : $m['amount'];?></th>
              <td><?=($this->uri->segment(3))
                ? form_number(array('name'=>'quantity['.$m['id'].'_'.$m['amount'].']',$disabled=>TRUE),set_value('quantity',$m['quantity']))
                : form_number(array('name'=>'quantity['.$m['id'].'_'.$m['amount'].']'),set_value('quantity'));?>
              </td>
              <td><?=($this->uri->segment(3))
                ? form_number(array('name'=>'price['.$m['id'].']',$disabled=>TRUE),set_value('price',$m['price']))
                : form_number(array('name'=>'price['.$m['id'].']'),set_value('price'));?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ที่</th>
            <th>หัวข้อ</th>
            <th>คงเหลือ</th>
            <th>จำนวน</th>
            <th>ราคา/หน่วย</th>
          </tr>
        </tfoot>
      </table>
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
