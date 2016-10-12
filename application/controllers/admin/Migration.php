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

	function setdefault()
	{
		$batch_customer = array(
			array(
				'fullname' => 'customer1',
				'card' => '1234567891',
				'address' => 'address',
				'email' => 'customer1@email.com',
				'phone' => '0000000001',
				'date_create' => date('d/m/Y')
			),
			array(
				'fullname' => 'customer2',
				'card' => '1234567892',
				'address' => 'address',
				'email' => 'customer2@email.com',
				'phone' => '0000000002',
				'date_create' => date('d/m/Y')
			),
			array(
				'fullname' => 'customer3',
				'card' => '1234567893',
				'address' => 'address',
				'email' => 'customer3@email.com',
				'phone' => '0000000003',
				'date_create' => date('d/m/Y')
			)
		);
		$batch_car = array(
			array(
				'customer_id' => '1',
				'name_brand' => 'porsche',
				'name_version' => '718cayman',
				'identity' => '12345',
				'date_create' => date('d/m/Y')
			),
			array(
				'customer_id' => '2',
				'name_brand' => 'volkswagen',
				'name_version' => 'scirocco',
				'identity' => '13542',
				'date_create' => date('d/m/Y')
			),
			array(
				'customer_id' => '3',
				'name_brand' => 'peugeot',
				'name_version' => '308sw',
				'identity' => '15243',
				'date_create' => date('d/m/Y')
			),
		);
		$batch_material = array(
			array(
				'name' => 'primacy3st',
				'brand' => 'michelin',
				'size' => '165/65/14/79/T',
				'detail' => 'DCP (Durable Contact Patch) กระจายแรงกด (Z-Pressure) อย่างสม่ำเสมอมากที่สุด ลดการสะสมตัวของความร้อน ทำให้ยางทนทาน ใช้งานได้ยาวนาน และ เพิ่มประสิทธิภาพการสัมผัสถนน ทำให้ได้สมรรถนะการยึดเกาะที่ดีอีกด้วย การออกแบบแก้มยางแบบแถบสี่เหลี่ยมหนา เพื่อป้องกันและลดความเสียหายที่จะเกิดขึ้นที่แก้มยางในขณะใช้งาน',
				'amount' => '100'
			),
			array(
				'name' => 'capsule egr 36',
				'brand' => 'enegy reform',
				'size' => '36',
				'detail' => 'ถังแก๊ส ENERGY REFORM มีให้เลือกหลากหลายขนาด เช่น ถังแก๊สแคปซูล ขนาด 36 ลิตร, ถังแก๊สแคปซูล ขนาด 48 ลิตร, ถังแก๊สแคปซูล ขนาด 58 ลิตร, ถังแก๊สแคปซูล ขนาด 60 ลิตร ตอบสนองความต้องการได้ทุกรูปแบบ เหมาะกับรถยนต์ทุกรุ่น ทุกยี่ห้อ ผลิดจากเหล็กเกรดคุณภาพ โดยโรงงานที่ได้มาตรฐาน มั่นใจถังแก๊ส ENERGY REFORM ทุกใบมีความปลอดภัยสูงสุด',
				'amount' => '100'
			),
			array(
				'name' => 'max bullet',
				'brand' => 'lenso',
				'size' => '17x10.0/PCD6x139.7/ET20',
				'detail' => 'ล้อแม็กซ์สีดำด้าน กลึงเงาหน้า ลาย เคลียร์ด้าน(MBF) MODEL : MAX - BULLET 17x10.0 PCD: 6x139.7 ET:-20 Wgt: 11.5 Kg',
				'amount' => '100'
			)
		);
		$this->db->insert_batch('customer', $batch_customer);
		$this->db->insert_batch('car', $batch_car);
		$this->db->insert_batch('material', $batch_material);
		redirect('admin/migration');
	}

}
