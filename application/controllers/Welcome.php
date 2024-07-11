<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url')); 
        $this->load->library(array('form_validation', 'session')); 
        $this->load->model('Consultas'); 
        
        // Cargar idioma
        $language = $this->session->userdata('site_lang') ?: 'spanish'; 
        $this->lang->load('website', $language);
    }


     public function index() {
        // Definir datos de ferias y fiestas
        $data['ferias'] = array(
            array('nombre' => 'Fiesta de la Candelaria', 'descripcion' => 'Celebración de la Virgen de la Candelaria en Puno, con danzas y música.', 'fecha_inicio' => '2024-02-01', 'fecha_fin' => '2024-02-15', 'imagen' => 'candelaria.jpg', 'lugar' => 'Puno'),
            array('nombre' => 'Carnaval de Juliaca', 'descripcion' => 'Carnaval tradicional con comparsas y desfiles.', 'fecha_inicio' => '2024-03-02', 'fecha_fin' => '2024-03-05', 'imagen' => 'carnaval_juliaca.jpg', 'lugar' => 'Juliaca'),
            array('nombre' => 'Feria de la Alasita', 'descripcion' => 'Feria dedicada a la compra de miniaturas que representan deseos.', 'fecha_inicio' => '2024-05-01', 'fecha_fin' => '2024-05-03', 'imagen' => 'alasita.jpg', 'lugar' => 'Puno'),
            array('nombre' => 'Fiesta de San Juan', 'descripcion' => 'Celebración en honor a San Juan Bautista, con danzas y festividades.', 'fecha_inicio' => '2024-06-24', 'fecha_fin' => '2024-06-25', 'imagen' => 'san_juan.jpg', 'lugar' => 'Azángaro'),
            array('nombre' => 'Aniversario de Lampa', 'descripcion' => 'Fiesta de aniversario de la ciudad de Lampa, con actividades culturales.', 'fecha_inicio' => '2024-07-21', 'fecha_fin' => '2024-07-23', 'imagen' => 'aniversario_lampa.jpg', 'lugar' => 'Lampa'),
            array('nombre' => 'Feria Internacional de la Alpaca', 'descripcion' => 'Feria dedicada a la promoción de la alpaca y sus derivados.', 'fecha_inicio' => '2024-08-15', 'fecha_fin' => '2024-08-17', 'imagen' => 'feria_alpaca.jpg', 'lugar' => 'Juliaca'),
            array('nombre' => 'Fiesta de San Pedro y San Pablo', 'descripcion' => 'Celebración en honor a los santos patronos San Pedro y San Pablo.', 'fecha_inicio' => '2024-06-29', 'fecha_fin' => '2024-06-30', 'imagen' => 'san_pedro_san_pablo.jpg', 'lugar' => 'Puno'),
            array('nombre' => 'Festival de Danzas Autóctonas', 'descripcion' => 'Festival que muestra danzas autóctonas de las comunidades de Puno.', 'fecha_inicio' => '2024-09-20', 'fecha_fin' => '2024-09-22', 'imagen' => 'danzas_autoctonas.jpg', 'lugar' => 'Puno')
        );

        $this->load->view('welcome_message', $data);
    }
    
    public function destinos() {
        $this->load->view('destinos');
    }

    public function detalle_destino($id) {
        $data['nombre_destino'] = '';
        $data['descripcion'] = '';
        $data['lugares'] = array();
        $data['latitud'] = -15.840221; // Ejemplo: Coordenadas de Puno
        $data['longitud'] = -70.021880; // Ejemplo: Coordenadas de Puno

        switch ($id) {
            case 1:
            $data['nombre_destino'] = 'AZÁNGARO';
            $data['descripcion'] = 'Azángaro es una ciudad peruana capital del distrito, de la provincia homónima en el departamento de Puno. Es la primera productora de ganadería del departamento.';
            $data['lugares'] = array(
                array('nombre' => 'Catedral de Azángaro', 'descripcion' => 'La Catedral de Azángaro es un lugar emblemático de la ciudad, conocida por su arquitectura colonial.', 'imagen' => 'catedral_azangaro.jpg'),
                array('nombre' => 'Plaza de Armas', 'descripcion' => 'La Plaza de Armas es el corazón de la ciudad, donde se realizan diversas actividades culturales y sociales.', 'imagen' => 'plaza_azangaro.jpg'),
            );
            $data['latitud'] = -14.900556; // Coordenadas de Azángaro
            $data['longitud'] = -69.8725; // Coordenadas de Azángaro
            break;
            case 2:
                $data['nombre_destino'] = 'CARABAYA';
                $data['descripcion'] = 'Carabaya es una provincia en el departamento de Puno, Perú. Es conocida por sus impresionantes paisajes montañosos y sitios históricos.';
                $data['lugares'] = array(
                    array('nombre' => 'Sitio Arqueológico de Inca Roca', 'descripcion' => 'El sitio arqueológico de Inca Roca es un lugar de gran importancia histórica en Carabaya.', 'imagen' => 'inca_roca.jpg'),
                    array('nombre' => 'Cascada de Chullumpi', 'descripcion' => 'La cascada de Chullumpi es una impresionante caída de agua ubicada en medio de la naturaleza.', 'imagen' => 'cascada_chullumpi.jpg'),
                );
                break;
            case 3:
            $data['nombre_destino'] = 'CHUCUITO';
            $data['descripcion'] = 'Chucuito es una provincia en el departamento de Puno, Perú. Es conocida por su arquitectura colonial y sus paisajes naturales.';
            $data['lugares'] = array(
                array('nombre' => 'Iglesia de Santo Domingo', 'descripcion' => 'La Iglesia de Santo Domingo es un hermoso ejemplo de arquitectura colonial en Chucuito.', 'imagen' => 'iglesia_santo_domingo.jpg'),
                array('nombre' => 'Lago Titicaca', 'descripcion' => 'El Lago Titicaca es el lago navegable más alto del mundo, compartido con Bolivia.', 'imagen' => 'lago_titicaca.jpg'),
            );
            break;
            case 4:
            $data['nombre_destino'] = 'EL COLLAO';
            $data['descripcion'] = 'El Collao es una provincia en el departamento de Puno, conocida por sus paisajes naturales y su cultura viva.';
            $data['lugares'] = array(
                array('nombre' => 'Isla de los Uros', 'descripcion' => 'Las Islas de los Uros son islas flotantes hechas de totora en el Lago Titicaca.', 'imagen' => 'isla_uros.jpg'),
                array('nombre' => 'Cañón de Tinajani', 'descripcion' => 'El Cañón de Tinajani es un impresionante paisaje de formaciones rocosas.', 'imagen' => 'canon_tinajani.jpg'),
            );
            break;
            case 5:
            $data['nombre_destino'] = 'HUANCANE';
            $data['descripcion'] = 'Huancané es una provincia en el departamento de Puno, conocida por su música tradicional y festividades.';
            $data['lugares'] = array(
                array('nombre' => 'Iglesia de San Francisco', 'descripcion' => 'La Iglesia de San Francisco es un importante sitio religioso en Huancané.', 'imagen' => 'iglesia_san_francisco.jpg'),
                array('nombre' => 'Mirador de Huancané', 'descripcion' => 'El Mirador de Huancané ofrece vistas panorámicas de la ciudad y sus alrededores.', 'imagen' => 'mirador_huancane.jpg'),
            );
            break;
            case 6:
            $data['nombre_destino'] = 'LAMPA';
            $data['descripcion'] = 'Lampa es una ciudad en el departamento de Puno, conocida por su arquitectura colonial y su historia rica.';
            $data['lugares'] = array(
                array('nombre' => 'Iglesia de Santiago Apóstol', 'descripcion' => 'La Iglesia de Santiago Apóstol es un ejemplo impresionante de la arquitectura colonial en Lampa.', 'imagen' => 'iglesia_santiago_apostol.jpg'),
                array('nombre' => 'Puente de Piedra', 'descripcion' => 'El Puente de Piedra es un antiguo puente construido durante la época colonial.', 'imagen' => 'puente_de_piedra.jpg'),
            );
            break;
            case 7:
            $data['nombre_destino'] = 'MELGAR';
            $data['descripcion'] = 'Melgar es una provincia en el departamento de Puno, conocida por su ganadería y sus paisajes montañosos.';
            $data['lugares'] = array(
                array('nombre' => 'Catedral de Melgar', 'descripcion' => 'La Catedral de Melgar es un importante sitio religioso en la ciudad.', 'imagen' => 'catedral_melgar.jpg'),
                array('nombre' => 'Reserva Nacional de Salinas y Aguada Blanca', 'descripcion' => 'Esta reserva nacional es un área protegida con una gran diversidad de fauna y flora.', 'imagen' => 'reserva_salinas.jpg'),
            );
            break;
            case 8:
            $data['nombre_destino'] = 'MOHO';
            $data['descripcion'] = 'Moho es una provincia en el departamento de Puno, conocida por sus paisajes naturales y su cultura viva.';
            $data['lugares'] = array(
                array('nombre' => 'Iglesia de Moho', 'descripcion' => 'La Iglesia de Moho es un importante sitio religioso en la ciudad.', 'imagen' => 'iglesia_moho.jpg'),
                array('nombre' => 'Parque Nacional Bahuaja-Sonene', 'descripcion' => 'Este parque nacional es una área protegida con una gran biodiversidad.', 'imagen' => 'parque_bahuaja_sonene.jpg'),
            );
            break;
            case 9:
            $data['nombre_destino'] = 'PUNO';
            $data['descripcion'] = 'Puno es una ciudad y un departamento en el sureste del Perú, conocido por su folclore, festividades y el Lago Titicaca.';
            $data['lugares'] = array(
                array('nombre' => 'Catedral de Puno', 'descripcion' => 'La Catedral de Puno es un edificio colonial ubicado en la Plaza de Armas de Puno.', 'imagen' => 'catedral_puno.jpg'),
                array('nombre' => 'Islas de los Uros', 'descripcion' => 'Las Islas de los Uros son islas flotantes hechas de totora en el Lago Titicaca.', 'imagen' => 'islas_uros.jpg'),
            );
            break;
            case 10:
            $data['nombre_destino'] = 'SAN ANTONIO DE PUTINA';
            $data['descripcion'] = 'San Antonio de Putina es una provincia en el departamento de Puno, conocida por sus baños termales y su agricultura.';
            $data['lugares'] = array(
                array('nombre' => 'Baños Termales de Putina', 'descripcion' => 'Los Baños Termales de Putina son conocidos por sus propiedades curativas.', 'imagen' => 'banos_termales_putina.jpg'),
                array('nombre' => 'Plaza de Armas de Putina', 'descripcion' => 'La Plaza de Armas de Putina es un importante centro social y cultural de la ciudad.', 'imagen' => 'plaza_armas_putina.jpg'),
            );
            break;
            case 11:
            $data['nombre_destino'] = 'SAN ROMAN';
            $data['descripcion'] = 'San Román es una provincia en el departamento de Puno, conocida por su actividad comercial y su cultura vibrante.';
            $data['lugares'] = array(
                array('nombre' => 'Mercado Central', 'descripcion' => 'El Mercado Central de San Román es un lugar vibrante lleno de productos locales.', 'imagen' => 'mercado_central_san_roman.jpg'),
                array('nombre' => 'Plaza de Armas de San Román', 'descripcion' => 'La Plaza de Armas de San Román es un importante punto de encuentro en la ciudad.', 'imagen' => 'plaza_armas_san_roman.jpg'),
            );
            break;
            case 12:
            $data['nombre_destino'] = 'SANDIA';
            $data['descripcion'] = 'Sandia es una provincia en el departamento de Puno, conocida por sus paisajes naturales y su biodiversidad.';
            $data['lugares'] = array(
                array('nombre' => 'Reserva Nacional Tambopata', 'descripcion' => 'Esta reserva nacional es conocida por su gran biodiversidad.', 'imagen' => 'reserva_tambopata.jpg'),
                array('nombre' => 'Catarata de Sandia', 'descripcion' => 'La Catarata de Sandia es una hermosa caída de agua rodeada de naturaleza.', 'imagen' => 'catarata_sandia.jpg'),
            );
            break;
            case 13:
            $data['nombre_destino'] = 'YUNGUYO';
            $data['descripcion'] = 'Yunguyo es una provincia en el departamento de Puno, conocida por sus paisajes naturales y su cultura viva.';
            $data['lugares'] = array(
                array('nombre' => 'Isla Amantaní', 'descripcion' => 'La Isla Amantaní es una isla en el Lago Titicaca conocida por su cultura y paisajes.', 'imagen' => 'isla_amantani.jpg'),
                array('nombre' => 'Templo de la Fertilidad', 'descripcion' => 'El Templo de la Fertilidad es un antiguo sitio arqueológico.', 'imagen' => 'templo_fertilidad.jpg'),
            );
            break;
            
        
            // Agrega más casos según los distritos que tengas
            default:
                $data['nombre_destino'] = 'Desconocido';
                $data['descripcion'] = 'Descripción no disponible.';
                $data['lugares'] = array();
                break;
        }
        $data['destino_id'] = $id;
        $this->load->view('destino_detalle', $data);
    }

    public function switch_language($language = "spanish") {
        $this->session->set_userdata('site_lang', $language);
        redirect($this->agent->referrer()); // Redirigir al usuario a la página anterior
    }

    public function login() {
        $this->load->view('register'); // Cambiar a 'register' si esta es la vista de login
    }

    public function politica_de_privacidad() {
        $this->load->view('politica_de_privacidad');
    }

    public function terminos_de_servicio() {
        $this->load->view('terminos_de_servicio');
    }

    public function show_register() {
        $this->load->view('show_register'); // Cambiar a 'register' si esta es la vista de registro
    }

    public function submit() {
        // Validar la entrada del usuario
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, recargar la vista de login
            $this->load->view('register');
        } else {
            // Procesar el inicio de sesión
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Comprobar las credenciales en la base de datos
            if ($this->Consultas->login($username, $password)) {
                // Si las credenciales son correctas, obtener el ID del usuario
                $usuario = $this->Consultas->get_user_by_username($username);
                $usuario_id = $usuario->id;

                // Establecer los datos de la sesión
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('usuario_id', $usuario_id); // Almacenar el usuario_id en la sesión
                $this->session->set_userdata('logged_in', TRUE);

                // Redirigir al panel
                redirect('welcome/panel');
            } else {
                // Si las credenciales son incorrectas, recargar la vista de login con un error
                $data['error'] = 'Usuario o contraseña incorrectos.';
                $this->load->view('register', $data);
            }
        }
    }

    public function register() {
        // Validar la entrada del usuario
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->load->view('register');
        } else {
            // Get input values
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Register the user
            if ($this->Consultas->register($username, $password)) {
                // Set success message in session
                $this->session->set_flashdata('success', 'Usuario registrado con éxito');
                // Redirect to login page
                redirect('welcome/login');
            } else {
                $data['error'] = 'No se pudo registrar el usuario. Inténtalo de nuevo.';
                $this->load->view('register', $data);
            }
        }
    }

    public function reservas($id) {
        $data = array();
        $data['nombre_destino'] = $this->get_destino_name_by_id($id); // Método que obtiene el nombre del destino por su ID
        $data['destino_id'] = $id;
        $this->load->view('reservas', $data);
    }

    public function submit_reserva() {
        // Validar la entrada del usuario
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('usuario_id', 'Usuario ID', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, recargar la vista de reservas
            $this->load->view('detalle_destino');
        } else {
            // Procesar la reserva
            $nombre = $this->input->post('nombre');
            $email = $this->input->post('email');
            $telefono = $this->input->post('telefono');
            $fecha = $this->input->post('fecha');
            $usuario_id = $this->input->post('usuario_id'); // Obtener el usuario_id del formulario
            $destino_id = $this->input->post('destino_id'); // Asumiendo que el destino_id viene del formulario

            // Depuración: imprimir valores
            log_message('debug', 'Usuario ID: ' . $usuario_id);
            log_message('debug', 'Destino ID: ' . $destino_id);
            log_message('debug', 'Nombre: ' . $nombre);
            log_message('debug', 'Email: ' . $email);
            log_message('debug', 'Teléfono: ' . $telefono);
            log_message('debug', 'Fecha: ' . $fecha);

            // Guardar la reserva en la base de datos
            if ($this->Consultas->guardar_reserva($usuario_id, $destino_id, $nombre, $email, $telefono, $fecha)) {
                // Reserva guardada con éxito
                $this->session->set_flashdata('success', 'Reserva realizada con éxito');
                redirect('welcome/detalle_destino/');
            } else {
                $data['error'] = 'No se pudo realizar la reserva. Inténtalo de nuevo.';
                $this->load->view('detalle_destino', $data);
            }
        }
    }
    private function get_destino_name_by_id($id) {
        // Método para obtener el nombre del destino por su ID
        // Este método debería consultar la base de datos o un array con los nombres de los destinos
        $destinos = array(
            1 => 'AZANGARO',
            2 => 'CARABAYA',
            // Otros destinos...
        );
        return $destinos[$id];
    }


    public function panel() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
        redirect('welcome/index');
        }
        $this->load->view('panel1');
    }

    public function verificaingreso() {
        $username = $this->input->post("user");
        $password = $this->input->post("pass");
        $resultado = $this->Consultas->login($username, $password);
        if ($resultado) {
            // Set session data
            $this->session->set_userdata('username', $username);
            $this->session->set_userdata('logged_in', TRUE);

            // Load user panel view
            $this->load->view('panel1');
        } else {
            echo "no puedes ingresar";
        }
    }

    public function logout() {
        // Destroy session data
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('welcome/index');
    }
    
 
}
