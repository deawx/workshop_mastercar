<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Admin_Controller {

	private $directory;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');
		$this->directory = directory_map('assets/report');
	}

  function activity()
  {
		$get = $this->input->get();
		if ($get)
			$this->export_csv($get);

		$activity = array();
		foreach ($this->directory as $a) :
			if (explode('_',$a)[0] === 'activity') :
				$activity[] = $a;
			endif;
		endforeach;

		$this->data['activity'] = $activity;
		$this->data['content'] = $this->load->view('report/activity', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
  }

  function material()
  {
		$get = $this->input->get();
		if ($get)
			$this->export_csv($get);

		$material = array();
		foreach ($this->directory as $a) :
			if (explode('_',$a)[0] === 'material') :
				$material[] = $a;
			endif;
		endforeach;

		$brand = $this->db->select('brand')->get('material')->result_array();
		$this->data['brand'] = array(''=>'เลือกรายการชื่อยี่ห้อ');
		foreach ($brand as $b) :
			$this->data['brand'][$b['brand']] = $b['brand'];
		endforeach;
		$this->data['material'] = $material;
		$this->data['content'] = $this->load->view('report/material', $this->data, TRUE);
		$this->load->view('_layout_main', $this->data);
  }

	function export_csv($get)
	{
		if ( ! $get)
			return FALSE;

		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');

		$table = $get['table'];
		$date_1 = $get['date_1'];
		$date_2 = $get['date_2'];
		$category = $get['category'];

		$filepath = realpath(APPPATH.'../assets/report');
		$filename = $table.'_'.$date_1.'_'.$date_2.'_'.$category.'_('.date('d-m-Y').').csv';

		switch ($table) :
		  case 'material':
				if ($category)
				 $this->db->where('a.category',$category);

				$this->db
					->select('m.*')
					->from('material as m');
		   break;
		 default:
			if ($category === 'บันทึกจ่ายออก')
			{
				$this->db
				->select('cs.fullname,cr.identity')
				->join('customer as cs','cs.id = a.customer_id')
				->join('car as cr','cr.id = a.car_id');
			}
		 	 $this->db
			 	->select('a.category,a.title,a.detail,a.date_create')
				->where('a.category',$category)
				->where('a.date_create >=',$date_1)
				->where('a.date_create <=',$date_2)
			 	->from('activity as a');
		   break;
		endswitch;
		$query = $this->db->get();

		echo '<pre>';
		print_r($query->result_array());
		echo '</pre>';
		die();

		$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
		$export = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
		if (write_file($filepath.'/'.$filename,"\xEF\xBB\xBF".$export)) :
			$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการบันทึกรายการเรียบร้อยแล้ว'));
			redirect('report/'.$table);
		endif;
		return FALSE;
	}

	function download_csv($filename)
	{
		$this->load->helper('download');
		force_download('assets/report/'.urldecode($filename),NULL);
	}

	function remove_csv($filename)
	{
		unlink('assets/report/'.urldecode($filename));
		$this->session->set_flashdata(array('class'=>'success','value'=>'ท่านได้ทำการลบรายการเรียบร้อยแล้ว'));
		redirect($this->agent->referrer());
	}

}
