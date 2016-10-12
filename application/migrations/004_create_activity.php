<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_activity extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => '5',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'customer_id' => array(
        'type' => 'INT',
        'constraint' => '5',
        'unsigned' => TRUE
      ),
      'car_id' => array(
        'type' => 'INT',
        'constraint' => '5',
        'unsigned' => TRUE
      ),
      'category' => array(
        'type' => 'VARCHAR',
        'constraint' => '50'
      ),
      'title' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'detail' => array(
        'type' => 'TEXT',
        'null' => TRUE
      ),
      'date_create' => array(
        'type' => 'VARCHAR',
        'constraint' => '10'
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('activity', TRUE, array('ENGINE' => 'InnoDB'));
  }

  public function down()
  {
    $this->dbforge->drop_table('activity');
  }

}
