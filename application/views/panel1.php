<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .panel-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #87CEEB; /* Color celeste claro */
        }

        p {
            font-size: 18px;
            color: #333;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn-primary, .btn-secondary {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }

        .btn-primary {
            background-color: #87CEEB; /* Color celeste claro */
        }

        .btn-primary:hover {
            background-color: #76b5c5; /* Un tono más oscuro de celeste */
        }

        .btn-secondary {
            background-color: #4CAF50; /* Color verde */
        }

        .btn-secondary:hover {
            background-color: #45a049; /* Un tono más oscuro de verde */
        }
    </style>
</head>
<body>
    <div class="panel-container">
        <h1>Bienvenido, <?php echo $this->session->userdata('username'); ?>!</h1>
        <p>Este es tu panel de usuario.</p>
        <div class="btn-container">
            <a href="<?php echo site_url('welcome/logout'); ?>" class="btn-primary">Cerrar sesión</a>
            <a href="<?php echo site_url('welcome/index'); ?>" class="btn-secondary">Volver a la página principal</a>
        </div>
    </div>
</body>
</html>
