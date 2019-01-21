<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_midia_table extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'NULL' => FALSE
            ),

            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'NULL' => TRUE
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('midia');
    }

    public function down() {
        $this->dbforge->drop_table('midia');
    }
}