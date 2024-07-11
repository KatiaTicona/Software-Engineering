<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('login');
    }

    public function submit() {
        // Validar la entrada del usuario
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, recargar la vista de login
            $this->load->view('login');
        } else {
            // Procesar el inicio de sesión
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Comprobar las credenciales en la base de datos
            $this->load->model('user_model');
            if ($this->user_model->login($username, $password)) {
                // Si las credenciales son correctas, redirigir al panel
                redirect('panel1');
            } else {
                // Si las credenciales son incorrectas, recargar la vista de login con un error
                $data['error'] = 'Usuario o contraseña incorrectos.';
                $this->load->view('login', $data);
            }
        }
    }
}
