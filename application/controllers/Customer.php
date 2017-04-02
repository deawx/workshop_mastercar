<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_model','customer');
	}

  function index($id='')
  {
		$this->data['customer'] = ($id === '') ? $this->customer->search()->result_array() : $this->customer->search_id($id)->row_array();
		$this->data['content'] = $this->load->view('customer/customer', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
  }

	function create($id='')
	{
		$post = $this->input->post();
		if ($post) :
			$post = (preg_replace("/[^@.\/a-zA-Z0-9ก-ฮ]+/", "", $post));
			$save = $this->customer->create($post);
			if ($save) :
				$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการบันทึกข้อมูลผู้ใช้บริการเรียบร้อยแล้ว'));
				redirect('customer');
			endif;
		endif;
		$this->data['customer'] = $this->customer->search_id($id)->row_array();
		$this->data['content'] = $this->load->view('customer/create', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
	}

	function delete($id)
	{
		$this->db->delete('customer',array('id'=>$id));
		$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการลบข้อมูลเรียบร้อยแล้ว'));
		redirect('customer');
	}

}
