<div class="btn-controls">
  <div class="btn-box-row row-fluid">
    <a href="customer" class="btn-box big span3"><i class="icon-group"></i><b><?=$customer;?></b>
      <p class="text-muted">ผู้ใช้บริการ</p>
    </a>
    <a href="car" class="btn-box big span3"><i class="icon-truck"></i><b><?=$car;?></b>
      <p class="text-muted">ยานพาหนะที่บริการ</p>
    </a>
    <a href="material" class="btn-box big span3"><i class="icon-cogs"></i><b><?=$material;?></b>
      <p class="text-muted">วัสดุ/อะไหล่</p>
    </a>
    <a href="" class="btn-box big span3"><i class="icon-bar-chart"></i><b><?=$out.'/'.$in;?></b>
      <p class="text-muted">รายการบริการ จ่ายออก/เก็บเข้า</p>
    </a>
  </div>
</div>

<?=anchor('dashboard/create','เปิดรายการบริการใหม่',array('class'=>'btn btn-primary pull-right')).br(2);?>
<div class="module">
  <div class="module-head"> <h3>รายการให้บริการ</h3> </div>
  <div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
      <thead>
        <tr>
          <th>ที่</th>
          <th>หัวข้อ</th>
          <th>ประเภทรายการ</th>
          <th>วันที่ให้บริการ</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($activity as $_a => $a) : ?>
          <tr>
            <td><?=++$_a;?></td>
            <td><?=anchor('dashboard/create/'.$a['id'],$a['title']);?></td>
            <td><?=$a['category'];?></td>
            <td><?=$a['date_create'];?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ที่</th>
          <th>หัวข้อ</th>
          <th>ประเภทรายการ</th>
          <th>วันที่ให้บริการ</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
