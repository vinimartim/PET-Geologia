<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_images_table extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),

            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'NULL' => TRUE
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('images');
    }

    public function down() {
        $this->dbforge->drop_table('images');
    }
}