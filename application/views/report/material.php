<div class="module">
  <?=form_open(uri_string(),array('class'=>'form-vertical','method'=>'get'));?>
  <?=form_hidden(array('table'=>'material','date_create'=>'','category'=>''));?>
  <div class="module-head">
    <?=heading('เรียกดูข้อมูลวัสดุ/อะไหล่ (ชื่อยี่ห้อ)', '3');?>
  </div>
  <div class="module-body">
    <div class="control-group">
      <div class="controls row-fluid">
        <?=form_label('ชื่อยี่ห้อ','brand',array('class'=>'span3'));?>
        <?=form_dropdown(array('name'=>'brand','class'=>'span9'),$brand);?>
      </div>
    </div>
  </div>
  <div class="module-foot">
    <div class="control-group">
      <div class="controls clearfix">
        <?=form_submit('', 'สั่งพิมพ์รายงานข้อมูล', array('class'=>'btn btn-primary'));?>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<div class="module">
  <div class="module-head"> <h3>รายการวัสดุ</h3> </div>
  <div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	display" width="100%">
      <thead>
        <tr>
          <th>ที่</th>
          <th>ชื่อไฟล์เอกสาร</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($material as $_a => $a) : ?>
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
