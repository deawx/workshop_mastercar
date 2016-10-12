<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends MY_Model {

  public $table_name = 'activity';
  public $rules = array(
    'activity' => array(
      array(
        'field' => 'title',
        'label' => 'หัวข้อการให้บริการ',
        'rules' => 'trim|required|max_length[100]'
      ),
      array(
        'field' => 'detail',
        'label' => 'รายละเอียดการให้บริการ',
        'rules' => 'trim|required'
      )
    )
  );

  function create($post,$quantity,$price)
  {
    $this->form_validation->set_rules($this->rules['activity']);
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $this->db->trans_begin();

    if (in_array('id',$post)) :
      $this->db->set($post)->update('activity');
    else:
      $this->db->insert('activity',$post);
    endif;
    $activity_id = $this->db->insert_id();
  	foreach ($quantity as $_q => $q) :
      $_q = explode('_',$_q)[0];
  		if ($activity_id) :
        $this->db->insert('material_usage',array(
          'activity_id'=>$activity_id,
          'material_id'=>$_q,
          'quantity'=>$q,
          'price'=>$price[$_q]
        ));
  		else:
        $this->db->set(array(
          'activity_id'=>$post['id'],
          'material_id'=>$_q,
          'quantity'=>$q,
          'price'=>$price[$_q]
        ))->update('material_usage');
  		endif;
      ($post['category'] === 'บันทึกจ่ายออก')
        ? $this->db->set('amount','amount-'.$q,FALSE)
        : $this->db->set('amount','amount+'.$q,FALSE);
      $this->db->where('id',explode('_',$_q)[0])->update('material');
  	endforeach;

    if ($this->db->trans_status() === FALSE)
      $this->db->trans_rollback();

    return $this->db->trans_commit();
  }

}
