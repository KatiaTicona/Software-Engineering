<?php
class Consultas extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Cargar la base de datos
    }

    public function register($username, $password) {
        $data = array(
            'usuario' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );
        return $this->db->insert('usuarios', $data);
    }

    public function login($username, $password) {
        $this->db->where('usuario', $username); // Asegúrate de usar 'usuario' si ese es el nombre de la columna
        $query = $this->db->get('usuarios');
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata('user_id', $user->id);
            return true;
        } else {
            return false;
        }
    }


    public function get_user_by_username($username) {
        $this->db->where('usuario', $username);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function guardar_reserva($usuario_id, $destino_id, $nombre, $email, $telefono, $fecha) {
        $reservas_db = $this->load->database('reservas', TRUE); // Cargar la base de datos de reservas

        $data = array(
            'usuario_id' => $usuario_id,
            'destino_id' => $destino_id,
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'fecha' => $fecha
        );

        return $reservas_db->insert('reservas', $data);
    }
}

