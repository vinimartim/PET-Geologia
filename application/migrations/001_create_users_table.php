<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_users_table extends CI_Migration {
    public function up() {
    	$this->dbforge->add_field(array(
    		'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'NULL' => FALSE
            ),

    		'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'NULL' => TRUE
            ),

            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'NULL' => FALSE
            ),

    		'password' => array(
                'type' => 'CHAR',
                'constraint' => '60',
                'NULL' => TRUE
            ),

            'active' => array(
                'type' => 'boolean',
                'default' => '1'
            )
        ));

    	$this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
        $usuarioDefault = array(
            'name' => 'admin',
            'username' => 'admin',
            'password' => md5('petgeo2019'),
        );
        $this->db->insert('users', $usuarioDefault);
    }

    public function down() {
    	$this->dbforge->drop_table('users');
    }
}