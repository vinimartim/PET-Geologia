<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils extends CI_Controller {
public function migrate() {
        $this->load->library("migration");
        $success = $this->migration->current();
        if ($success) {
            echo "Migration Successful";
        } else {
            show_error($this->migration->error_string());
        }
    }
}