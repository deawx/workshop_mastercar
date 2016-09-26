<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Material_model','material');
	}

  function index()
  {
		$this->data['negative'] = $this->material->count_search('amount < 5');
		$this->data['materials'] = $this->material->count_search();
		$this->data['material'] = $this->material->search()->result_array();
		$this->data['content'] = $this->load->view('material/material', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
  }

	function create($id='')
	{
		$post = $this->input->post();
		if ($post) :
			$save = $this->material->create($post);
			if ($save) :
				$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการบันทึกข้อมูลวัสดุเรียบร้อยแล้ว'));
				redirect('material');
			endif;
		endif;
		$this->data['material'] = $this->material->search_id($id)->row_array();
		$this->data['content'] = $this->load->view('material/create', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
	}

	function delete($id)
	{
		$this->db->delete('material',array('id'=>$id));
		$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการลบข้อมูลเรียบร้อยแล้ว'));
		redirect('material');
	}

}
