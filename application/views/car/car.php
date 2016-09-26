<div class="btn-controls">
  <div class="btn-box-row row-fluid">
    <a href="car" class="btn-box big span12"><i class="icon-truck"></i><b><?=count($car);?></b>
      <p class="text-muted">ยานพาหนะที่บริการ</p>
    </a>
  </div>
</div>
<?=anchor('car/create','เพิ่มยานพาหนะ',array('class'=>'btn btn-primary pull-right')).br(2);?>
<div class="module">
  <div class="module-head"> <h3>รายการยานพาหนะที่เข้ารับบริการ</h3> </div>
  <div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
      <thead>
        <tr>
          <th>ที่</th>
          <th>ชื่อยี่ห้อ</th>
          <th>ชื่อรุ่น-รหัส</th>
          <th>หมายเลขทะเบียน</th>
          <th>วันที่บันทึก</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($car as $_c => $c) : ?>
          <tr>
            <td><?=++$_c;?></td>
            <td><?=$c['name_brand'];?></td>
            <td><?=$c['name_version'];?></td>
            <td><?=anchor('car/create/'.$c['id'],$c['identity']);?></td>
            <td><?=$c['date_create'];?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ที่</th>
          <th>ชื่อยี่ห้อ</th>
          <th>ชื่อรุ่น-รหัส</th>
          <th>หมายเลขทะเบียน</th>
          <th>วันที่บันทึก</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
