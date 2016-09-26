<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Car_model','car');
	}

  function index($id='')
  {
		$this->data['car'] = ($id === '') ? $this->car->search()->result_array() : $this->car->search_id($id)->row_array();
		$this->data['content'] = $this->load->view('car/car', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
  }

	function create($id='')
	{
		$post = $this->input->post();
		if ($post) :
			$save = $this->car->create($post);
			if ($save) :
				$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการบันทึกข้อมูลยานพาหนะเรียบร้อยแล้ว'));
				redirect('car');
			endif;
		endif;
		$this->data['car'] = $this->car->search_id($id)->row_array();
		$this->data['content'] = $this->load->view('car/create', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
	}

	function delete($id)
	{
		$this->db->delete('car',array('id'=>$id));
		$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการลบข้อมูลเรียบร้อยแล้ว'));
		redirect('car');
	}

}
