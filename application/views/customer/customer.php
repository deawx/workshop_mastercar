<div class="btn-controls">
  <div class="btn-box-row row-fluid">
    <a href="customer" class="btn-box big span12"><i class="icon-group"></i><b><?=count($customer);?></b>
      <p class="text-muted">ผู้ใช้บริการ</p>
    </a>
</div>
<?=anchor('customer/create','เพิ่มผู้ใช้บริการ',array('class'=>'btn btn-primary pull-right')).br(2);?>
<div class="module">
  <div class="module-head"> <h3>รายการผู้ใช้บริการ</h3> </div>
  <div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
      <thead>
        <tr>
          <th>ที่</th>
          <th>ชื่อ-นามสกุล</th>
          <th>เบอร์โทรศัพท์บ้าน</th>
          <th>เบอร์โทรศัพท์มือถือ</th>
          <th>วันที่บันทึก</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($customer as $_c => $c) : ?>
          <tr>
            <td><?=++$_c;?></td>
            <td><?=anchor('customer/create/'.$c['id'],$c['fullname']);?></td>
            <td><?=$c['phone_home'];?></td>
            <td><?=$c['phone_mobile'];?></td>
            <td><?=$c['date_create'];?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ที่</th>
          <th>ชื่อ-นามสกุล</th>
          <th>เบอร์โทรศัพท์บ้าน</th>
          <th>เบอร์โทรศัพท์มือถือ</th>
          <th>วันที่บันทึก</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
