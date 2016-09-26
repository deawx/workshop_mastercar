<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model','auth');
	}

  function index()
  {
		if ($this->session->is_login === TRUE)
			redirect('dashboard');

		$post = $this->input->post();
		if (count($post) > 0) :
			$admin = $this->auth->login($post);
			if ($admin !== FALSE) :
				$this->session->set_userdata($admin);
	      $this->session->set_userdata('is_login',TRUE);
	      $this->session->set_userdata('is_role',$admin['role']);
	      $this->session->set_flashdata(array('class'=>'success','value'=>'ยินดีต้อนรับเข้าสู่ระบบ มาสเตอร์คาร์คลีนิค'));
	      redirect('dashboard');
			endif;
		endif;
		$this->data['content'] = $this->load->view('auth/signin', $this->data, TRUE);
		$this->load->view('_layout_auth', $this->data);
  }

	function edit($id)
	{
		$post = $this->input->post();
		if ($post) :
			$save = $this->auth->update($post);
			if ($save !== FALSE) :
				$this->session->set_userdata(array(
						'fullname' => $post['fullname'],
						'username' => $post['username']
				));
				$this->session->set_flashdata(array('class'=>'success','value'=>'บันทึกข้อมูล เสร็จสิ้น'));
				redirect($this->agent->referrer());
			endif;
		endif;

		$id = intval($id);
		if ($this->session->is_login === FALSE || (int)$this->session->id !== (int)$id)
			redirect('dashboard');

		$this->data['content'] = $this->load->view('auth/edit', $this->auth->search_id($id)->row_array(), TRUE);
		$this->load->view('_layout_auth', $this->data);
	}

	function change_password($id)
	{
		$post = $this->input->post();
		if ($post) :
			$save = $this->auth->change_password($post);
			if ($save !== FALSE) :
				$this->signout();
			endif;
		endif;

		$id = intval($id);
		if ($this->session->is_login === FALSE || (int)$this->session->id !== (int)$id)
			redirect('dashboard');

		$this->data['content'] = $this->load->view('auth/change_password', $this->auth->search_id($id)->row_array(), TRUE);
		$this->load->view('_layout_auth', $this->data);
	}

	function signout()
	{
		$this->session->sess_destroy();
    redirect('auth');
	}

}
