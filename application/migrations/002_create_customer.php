<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_customer extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' =>TRUE
      ),
      'fullname' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'card' => array(
        'type' => 'VARCHAR',
        'constraint' => '13'
      ),
      'address' => array(
        'type' => 'TEXT',
        'null' => TRUE
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '50'
      ),
      'phone_home' => array(
        'type' => 'VARCHAR',
        'constraint' => '15'
      ),
      'phone_mobile' => array(
        'type' => 'VARCHAR',
        'constraint' => '15'
      ),
      'date_create' => array(
        'type' => 'VARCHAR',
        'constraint' => '10'
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('customer', TRUE, array('ENGINE' => 'InnoDB'));
  }

  public function down()
  {
    $this->dbforge->drop_table('customer');
  }

}
