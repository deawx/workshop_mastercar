<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_model extends MY_Model {

  public $table_name = 'car';
  public $rules = array(
    'car' => array(
      array(
        'field' => 'name_brand',
        'label' => 'ชื่อยี่ห้อ',
        'rules' => 'required|max_length[100]'
      ),
      array(
        'field' => 'name_version',
        'label' => 'ชื่อรุ่น-รหัส',
        'rules' => 'required|max_length[100]'
      ),
      array(
        'field' => 'identity',
        'label' => 'หมายเลขทะเบียน',
        'rules' => 'required|max_length[100]'
      )
    )
  );

  function create($post)
  {
    $this->form_validation->set_rules($this->rules['car']);
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    if ($_FILES['picture']['name']) :
      $upload = array(
        'allowed_types'	=> 'jpg|jpeg|png',
        'upload_path'	=> realpath(APPPATH.'../assets/picture/'),
        'file_name'		=> $post['identity'].'.jpg',
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->load->library('upload',$upload);
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('picture')) :
        $resize = array(
          'image_library' => 'gd2',
          'source_image' => $this->upload->data('full_path'),
          'maintain_ratio' => FALSE,
          'width' => '350',
          'height' => '350',
        );
        $this->load->library('image_lib',$resize);
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
        $post['picture'] = $this->upload->data('file_name');
      else:
        $this->session->set_flashdata(array('class'=>'error','value'=>print_r($this->upload->display_errors())));
      endif;
    endif;

    return $this->save($post);
  }

}
