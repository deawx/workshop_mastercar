<div class="btn-controls">
  <div class="btn-box-row row-fluid">
    <a href="material" class="btn-box big span6"><i class="icon-warning-sign"></i><b><?=$negative;?></b>
      <p class="text-muted">คงเหลือในสต้อคต่ำกว่า 5 ชิ้น</p>
    </a>
    <a href="material" class="btn-box big span6"><i class="icon-cogs"></i><b><?=$materials;?></b>
      <p class="text-muted">วัสดุ/อะไหล่ทั้งหมด</p>
    </a>
  </div>
</div>
<?=anchor('material/create','เพิ่มข้อมูลวัสดุใหม่',array('class'=>'btn btn-primary pull-right')).br(2);?>
<div class="module">
  <div class="module-head"> <h3>รายการวัสดุ</h3> </div>
  <div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
      <thead>
        <tr>
          <th></th>
          <th>ชื่อรายการ</th>
          <th>ขนาด</th>
          <th>คงเหลือ</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($material as $m) : ?>
          <tr>
            <td><?=img(array('src'=>'assets/picture/'.$m['picture'],'width'=>'100px','height'=>'100px'));?></td>
            <td><?=anchor('material/create/'.$m['id'],$m['name']);?></td>
            <td><?=$m['size'];?></td>
            <td><?=$m['amount'];?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th></th>
          <th>หัวข้อ</th>
          <th>ขนาด</th>
          <th>คงเหลือ</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
