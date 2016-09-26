<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_material extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => '5',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'brand' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'size' => array(
        'type' => 'VARCHAR',
        'constraint' => '50'
      ),
      'detail' => array(
        'type' => 'TEXT'
      ),
      'amount' => array(
        'type' => 'INT',
        'constraint' => '5'
      ),
      'picture' => array(
        'type' => 'VARCHAR',
        'constraint' => '150'
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('material', TRUE, array('ENGINE' => 'InnoDB'));
  }

  public function down()
  {
    $this->dbforge->drop_table('material');
  }

}
