  <p>
    <?=anchor('admin/migration/latest','ติดตั้งฐานข้อมูล',array('class'=>'btn btn-primary', 'onclick'=>"return confirm('อัพเดทระบบฐานข้อมูล ?');"));?>
    ปรับปรุงฐานข้อมูลให้เป็นปัจจุบัน
  </p>
  <p>
    <?=anchor('admin/migration/setdefault','ติดตั้งชุดข้อมูลจำลอง',array('class'=>'btn btn-primary', 'onclick'=>"return confirm('ติดตั้งชุดข้อมูลจำลอง ?');"));?>
    ติดตั้งชุดข้อมูล(จำลอง)เริ่มต้น
  </p>
  <p>
    <?=anchor('admin/migration/reset','รีเซ็ต',array('class'=>'btn btn-primary', 'onclick'=>"return confirm('ต้องการติดตั้งระบบฐานข้อมูลใหม ?่');"));?>
    รีเซ็ตฐานข้อมูลใหม่
  </p>
