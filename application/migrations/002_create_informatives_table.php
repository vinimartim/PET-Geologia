<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_informatives_table extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),

            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '140',
                'NULL' => TRUE
            ),

            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'NULL' => TRUE
            ),

            'content' => array(
                'type' => 'TEXT',
                'NULL' => TRUE
            ),

            'home_active' => array (
                'type' => 'boolean',
                'default' => '0',
                'NULL' => TRUE
            ),

            'user_id' => array(
                'type' => 'boolean',
                'NULL' => TRUE
            )
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('informatives');
    }

    public function down() {
        $this->dbforge->drop_table('informatives');
    }
}