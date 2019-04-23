<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_about_table extends CI_Migration {
    public function up() {
    	$this->dbforge->add_field(array(
    		'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'NULL' => FALSE
            ),
    		'content' => array(
                'type' => 'text',
                'NULL' => FALSE
			)
		));

    	$this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('about');
        $textoDefault = array(
			'content' => 'O PET Geologia é o programa de educação tutorial da UNESP de Rio Claro. Criado pelo MEC, os grupos PET realizam diversas atividades extracurriculares de ensino, pesquisa e extensão. O grupo é formado por um professor tutor, 12 alunos bolsistas e alunos voluntários. Para conhecer nosso trabalho, fique ligado em nosso blog e em nossa página no Facebook ou participe de uma reunião do grupo.
			
			Nossas reuniões ocorrem às terças-feiras às 12h45min na sala II do Bloco Didático GI do campus da UNESP de Rio Claro e estão abertas a todos que quiserem participar.'
        );
        $this->db->insert('about', $textoDefault);
    }

    public function down() {
    	$this->dbforge->drop_table('about');
    }
}