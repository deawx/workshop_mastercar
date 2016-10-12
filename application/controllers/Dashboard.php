<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_model','customer');
		$this->load->model('Car_model','car');
		$this->load->model('Activity_model','activity');
		$this->load->model('Material_model','material');
	}

  function index()
  {
		$this->data['customer'] = $this->customer->count_search();
		$this->data['car'] = $this->car->count_search();
		$this->data['out'] = $this->activity->count_search(array('category'=>'บันทึกจ่ายออก'));
		$this->data['in'] = $this->activity->count_search(array('category'=>'บันทึกเก็บเข้า'));
		$this->data['material'] = $this->material->count_search();
		$this->data['activity'] = $this->activity->search()->result_array();
		$this->data['content'] = $this->load->view('dashboard/dashboard', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
  }

	function create($id='')
	{
		$post = $this->input->post();
		if ($post) :

			// echo '<pre>';
			// print_r($post);
			// echo '</pre>';

			$quantity = array_filter($post['quantity']);
			$price = array_filter($post['price']);
			unset($post['DataTables_Table_0_length']);
			unset($post['quantity']);
			unset($post['price']);

			if ($post['category'] === 'บันทึกจ่ายออก') :
				foreach ($quantity as $_q => $q) :
					if ($q > explode('_',$_q)[1]) :
						$this->session->set_flashdata(array('class'=>'danger','value'=>'ท่านได้เลิกจำนวนไม่ตรงกับในสต้อค'));
						redirect('dashboard');
					endif;
				endforeach;
			endif;

			$save = $this->activity->create($post,$quantity,$price);
			if ($save) :
				$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการบันทึกข้อมูลการให้บริการเรียบร้อยแล้ว'));
				redirect('dashboard');
			endif;
		endif;
		$this->data['customer'] = array(''=>'เลือกรายการผู้ใช้บริการ');
		$this->data['car'] = array(''=>'เลือกหมายเลขทะเบียนยานพาหนะ');
		$customer = $this->customer->search('','','','id ASC')->result_array();
		foreach ($customer as $cs) :
			$this->data['customer'][$cs['id']] = $cs['fullname'];
		endforeach;
		$car = $this->car->search('','','','id ASC')->result_array();
		foreach ($car as $cr) :
			$this->data['car'][$cr['id']] = $cr['identity'];
		endforeach;
		$this->data['activity'] = $this->activity->search_id($id)->row_array();
		$this->data['material'] = $this->material->search()->result_array();
		$this->data['material_usage'] = $this->db
			->join('material as mt','mt.id = mu.material_id')
			->where('mu.activity_id',$id)
			->get('material_usage as mu')
			->result_array();
		$this->data['material'] = $this->material->search()->result_array();
		$this->data['content'] = $this->load->view('dashboard/create', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
	}

	function delete($id)
	{
		$this->db->delete('activity',array('id'=>$id));
		$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการลบข้อมูลการให้บริการเรียบร้อยแล้ว'));
		redirect('dashboard');
	}

}
