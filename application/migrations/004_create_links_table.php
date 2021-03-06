<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_links_table extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
            'type' => 'INT',
            'unsigned' => TRUE,
            'auto_increment' => TRUE
			),
			
			'title' => array(
				'type' => 'VARCHAR',
                'constraint' => '255',
                'NULL' => TRUE
			),

			'description' => array(
                'type' => 'TEXT',
                'NULL' => TRUE
			),

            'url' => array(
                'type' => 'TEXT',
                'NULL' => TRUE
            ),

            'icon' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'NULL' => TRUE
            ),

            'home_section' => array(
                'type' => 'int',
                'constraint' => '4',
                'NULL' => TRUE
            )
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('links');
    }

    public function down() {
        $this->dbforge->drop_table('links');
    }
}