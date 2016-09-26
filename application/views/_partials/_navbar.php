<?php if ($this->session->is_login === TRUE) : ?>
  <div class="nav-collapse collapse navbar-inverse-collapse">
    <ul class="nav pull-right">
      <li class="nav-user dropdown">
        <?php
        echo anchor('#',img('assets/images/user.png','',array('class'=>'nav-avatar')).'<b class="caret"></b>',array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'));
        echo ul(array(
          anchor('auth/edit/'.$this->session->id,'<i class="menu-icon icon-edit"></i> แก้ไขข้อมูล'),
          anchor('auth/change_password/'.$this->session->id,'<i class="menu-icon icon-edit"></i> เปลี่ยนรหัสผ่าน'),
          '<li class="divider"></li>',
          anchor('auth/signout','<i class="menu-icon icon-signout"></i> ออกจากระบบ')
        ),array('class'=>'dropdown-menu'));
        ?>
      </li>
    </ul>
  </div>
<?php endif; ?>
