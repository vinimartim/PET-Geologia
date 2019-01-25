<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_pagina_table extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'NULL' => FALSE
            ),

            'titulo' => array(
                'type' => 'VARCHAR',
                'constraint' => '140',
                'NULL' => FALSE
            ),

            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'NULL' => TRUE
            ),

            'conteudo' => array(
                'type' => 'TEXT',
                'NULL' => FALSE
            ),

            'atv_inicio' => array (
                'type' => 'boolean',
                'default' => '0',
            ),

            'user_id' => array(
                'type' => 'boolean',
                'NULL' => FALSE
            )
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('pagina');
    }

    public function down() {
        $this->dbforge->drop_table('pagina');
    }
}