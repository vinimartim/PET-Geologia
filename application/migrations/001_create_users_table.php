<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_users_table extends CI_Migration {
    public function up() {
    	$this->dbforge->add_field(array(
    		'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),

    		'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'NULL' => TRUE
            ),

            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'NULL' => TRUE
            ),

            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'NULL' => TRUE
            ),

            'phone' =>array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'NULL' => TRUE
            ),

    		'password' => array(
                'type' => 'CHAR',
                'constraint' => '60',
                'NULL' => TRUE
            ),

            'active' => array(
                'type' => 'boolean',
                'default' => '1',
                'NULL' => TRUE
            )
        ));

    	$this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
        $usuarioDefault = array(
            'name' => 'PET Geologia',
            'email' => 'petgeo@petgeo.com',
            'phone' => '0055555555',
            'username' => 'admin',
            'password' => md5('petgeo2019'),
        );
        $this->db->insert('users', $usuarioDefault);
    }

    public function down() {
    	$this->dbforge->drop_table('users');
    }
}