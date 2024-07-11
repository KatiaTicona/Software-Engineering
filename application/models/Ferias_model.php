<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ferias_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_ferias(){
        $query = $this->db->get('ferias');
        return $query->result_array();
    }
}
?>
