<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_admin extends CI_Migration {

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
        'constraint' => '150'
      ),
      'username' => array(
        'type' => 'VARCHAR',
        'constraint' => '30'
      ),
      'password' => array(
        'type' => 'VARCHAR',
        'constraint' => '32'
      ),
      'role' => array(
        'type' => 'ENUM("owner","admin")',
        'default' => 'admin',
        'null' => FALSE
      ),
      'date_create' => array(
        'type' => 'VARCHAR',
        'constraint' => '10'
      ),
      'date_activity' => array(
        'type' => 'VARCHAR',
        'constraint' => '10'
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('admin', TRUE, array('ENGINE' => 'InnoDB'));
  }

  public function down()
  {
    $this->dbforge->drop_table('admin');
  }

}
