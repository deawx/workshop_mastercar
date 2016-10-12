<div class="module">
  <?=form_open(uri_string(),array('class'=>'form-horizontal row-fluid','method'=>'get'));?>
  <?=form_hidden(array('table'=>'activity'));?>
  <div class="module-head">
    <?=heading('เรียกดูข้อมูลการให้บริการ (วันที่)', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <?=form_label('เลือกวันที่','date_create',array('class'=>'control-label'));?>
      <div class="controls">
        <?=form_input(array('name'=>'date_create','class'=>'datepicker span9','placeholder'=>'เลือกวันที่'));?>
      </div>
    </div>
    <div class="control-group">
      <?=form_label('เลือกประเภทรายการ','',array('class'=>'control-label'));?>
      <div class="controls">
        <label class="radio">
          <?=form_radio(array('name'=>'category'),'บันทึกจ่ายออก',TRUE).' บันทึกจ่ายออก';?>
        </label>
        <label class="radio">
          <?=form_radio(array('name'=>'category'),'บันทึกเก็บเข้า').' บันทึกเก็บเข้า';?>
        </label>
      </div>
    </div>
  </div>
  <div class="module-foot">
    <div class="control-group">
      <div class="controls clearfix">
        <?=form_submit('', 'เรียกดูรายงานข้อมูล', array('class'=>'btn btn-primary'));?>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div class="module">
  <div class="module-head"> <h3>รายการให้บริการ</h3> </div>
  <div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
      <thead>
        <tr>
          <th>ที่</th>
          <th>ชื่อไฟล์เอกสาร</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($activity as $_a => $a) : ?>
          <?php $download = anchor('report/download_csv/'.urlencode($a),'ดาวน์โหลด',array('class'=>'btn btn-success')); ?>
          <?php $delete = anchor('report/remove_csv/'.urlencode($a),'ลบ',array('class'=>'btn btn-danger','onclick'=>"return confirm('ท่านต้องการลบไฟล์นี้?');")); ?>
          <tr>
            <td><?=++$_a;?></td>
            <td><?=explode('.',$a)[0];?></td>
            <td><?=$download.nbs(5).$delete;?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ที่</th>
          <th>ชื่อไฟล์เอกสาร</th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
