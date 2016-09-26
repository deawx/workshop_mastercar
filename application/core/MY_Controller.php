<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  protected $data = array();

  public function __construct()
  {
    parent::__construct();
    $this->data['title'] = $this->config->item('site_title');
    $this->data['header'] = $this->config->item('site_header');;
    $this->data['footer'] = $this->config->item('site_footer');;
    $this->data['meta'] = array();
    $this->data['keyword'] = array();
  }

}

class Admin_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->session->is_login !== TRUE)
      redirect('auth');
  }

}

class Owner_Controller extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->session->is_role !== 'owner')
      redirect('auth');
  }

}
