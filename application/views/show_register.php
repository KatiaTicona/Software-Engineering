<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #87CEEB; /* Color celeste claro */
        }

        .message {
            color: green;
            text-align: center;
        }

        .error {
            color: red;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
            padding: 10px;
            background-color: #87CEEB; /* Color celeste claro */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #76b5c5; /* Un tono más oscuro de celeste */
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #87CEEB; /* Color celeste claro */
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Registrar Usuario</h2>
        <?php if ($this->session->flashdata('success')): ?>
            <p class="message"><?php echo $this->session->flashdata('success'); ?></p>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="<?php echo site_url('welcome/register'); ?>" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="btn-primary">Registrar</button>
        </form>
        <div class="login-link">
            <p>¿Ya tienes una cuenta? <a href="<?php echo site_url('welcome/login'); ?>">Iniciar Sesión</a></p>
        </div>
    </div>
</body>
</html>
