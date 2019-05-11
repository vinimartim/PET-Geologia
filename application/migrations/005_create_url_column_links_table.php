<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_url_column_links_table extends CI_Migration {
	public function up() {
		if (! $this->db->field_exists('url', 'links')) {
			$this->load->dbforge();

			$campos = array(
				'url' => array(
					'type' => 'text',
					'NULL' => TRUE
				)
			);

			$this->dbforge->add_column('links', $campos);
		}
	}

	public function down() {
        $this->dbforge->drop_column('links','url');
    }
}