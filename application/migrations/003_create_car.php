<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_car extends CI_Migration {

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
      'name_brand' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'name_version' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'identity' => array(
        'type' => 'VARCHAR',
        'constraint' => '10'
      ),
      'date_create' => array(
        'type' => 'VARCHAR',
        'constraint' => '10'
      ),
      'picture' => array(
        'type' => 'VARCHAR',
        'constraint' => '23'
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('car', TRUE, array('ENGINE' => 'InnoDB'));
  }

  public function down()
  {
    $this->dbforge->drop_table('car');
  }

}
