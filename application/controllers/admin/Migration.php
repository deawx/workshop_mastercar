<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
	}

	function index()
	{
		$this->data['content'] = $this->load->view('migration/migrate', $this->data, TRUE);
		$this->load->view('_layout_blank', $this->data);
	}

	function reset()
	{
		if ($this->migration->version(1) === FALSE)
			show_error($this->migration->error_string());

		$this->migration->current();
		redirect('admin/migration');
	}

  function latest()
  {
    if ($this->migration->current() === FALSE)
      show_error($this->migration->error_string());

		redirect('admin/migration');
  }

}
