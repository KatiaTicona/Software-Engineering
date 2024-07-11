<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destinos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->destinos_db = $this->load->database('destinos', TRUE); // Cargar la configuración de la base de datos 'destinos'
    }

    public function get_destino($id) {
        $this->destinos_db->where('id', $id);
        $query = $this->destinos_db->get('destinos');
        return $query->row_array();
    }

    public function get_lugares_turisticos($destino_id) {
        $this->destinos_db->where('destino_id', $destino_id);
        $query = $this->destinos_db->get('lugares_turisticos');
        return $query->result_array();
    }
}