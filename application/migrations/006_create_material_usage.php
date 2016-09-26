<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_material_usage extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => '5',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'activity_id' => array(
        'type' => 'INT',
        'constraint' => '5',
        'unsigned' => TRUE
      ),
      'material_id' => array(
        'type' => 'INT',
        'constraint' => '5',
        'unsigned' => TRUE
      ),
      'quantity' => array(
        'type' => 'INT',
        'constraint' => '5',
        'unsigned' => TRUE
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('material_usage', TRUE, array('ENGINE' => 'InnoDB'));
  }

  public function down()
  {
    $this->dbforge->drop_table('material_usage');
  }

}
