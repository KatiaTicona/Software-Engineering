<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // Asegúrate de que el método de cifrado coincida con el utilizado al almacenar las contraseñas
        $query = $this->db->get('users'); // Asegúrate de que el nombre de la tabla coincida

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
