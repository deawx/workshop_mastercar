<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends MY_Model {

  public $table_name = 'customer';
  public $rules = array(
    'customer' => array(
      array(
        'field' => 'fullname',
        'label' => 'ชื่อ-นามสกุล',
        'rules' => 'required|max_length[100]'
      ),
      array(
        'field' => 'card',
        'label' => 'หมายเลขบัตรประชาชน',
        'rules' => 'required|is_unique'
      ),
      array(
        'field' => 'phone_home',
        'label' => 'หมายเลขโทรศัพท์',
        'rules' => 'required'
      ),
      array(
        'field' => 'phone_mobile',
        'label' => 'หมายเลขโทรศัพท์',
        'rules' => 'required'
      ),
      array(
        'field' => 'email',
        'label' => 'ที่อยู่อีเมล์',
        'rules' => 'required|valid_email|is_unique'
      ),
      array(
        'field' => 'address',
        'label' => 'ที่อยู่',
        'rules' => 'required'
      )
    )
  );

  function create($post)
  {
    $this->form_validation->set_rules($this->rules['customer']);
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    return $this->save($post);
  }

}
