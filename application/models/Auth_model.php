<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends MY_Model {

  public $table_name = 'admin';
  public $rules = array(
    'login' => array(
      array(
        'field' => 'username',
        'label' => 'ชื่อผู้ใช้',
        'rules' => 'trim|required|max_length[30]'
      ),
      array(
        'field' => 'password',
        'label' => 'รหัสผ่าน',
        'rules' => 'trim|required|max_length[32]'
      )
    ),
    'change_password' => array(
      array(
        'field' => 'new_password',
        'label' => 'รหัสผ่านใหม่',
        'rules' => 'trim|required|differs[old_password]|max_length[32]'
      ),
      array(
        'field' => 'new_password_confirm',
        'label' => 'รหัสผ่านใหม่(ยืนยัน)',
        'rules' => 'trim|required|matches[new_password]|max_length[32]'
      )
    )
  );

  function login($post)
  {
    $this->form_validation->set_rules($this->rules['login']);
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $data = $this->search($post);
    if ($data->num_rows() > 0) :
      return $data->row_array();
    else:
      $this->session->set_flashdata(array('class'=>'success','value'=>'ชื่อผู้ใช้หรือรหัสผ่าน ไม่ถูกต้อง'));
      return FALSE;
    endif;
  }

  function update($post)
  {
    if ($post['username'] !== $post['re_username'])
      $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'trim|required|max_length[30]|is_unique[admin.username]');

    $this->form_validation->set_rules('fullname', 'ชื่อ-สกุล', 'trim|required|max_length[100]');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    unset($post['re_username']);
    return $this->save($post);
  }

  function change_password($post)
  {
    if ($post['re_password'] !== $post['old_password'])
      $this->form_validation->set_rules('old_password', 'รหัสผ่านเดิม', 'callback_is_confirm');

    $this->form_validation->set_rules($this->rules['change_password']);
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    return $this->save(array('password'=>$post['new_password'],'id'=>$post['id']));
  }

}
