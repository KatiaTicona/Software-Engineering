<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo Rural Comunitario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #5bc0de;
            color: white;
        }
        .logo h1 {
            margin: 0;
        }
        nav {
            display: flex;
            align-items: center;
        }
        .btn-login {
            background-color: white;
            color: #5bc0de;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #ddd;
        }
        .hero {
            background-image: url('<?php echo base_url("https://punovirtual.ed.pe/assets/images/Fondo_Inicio.jpg"); ?>');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }
        .hero-content {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }
        .hero h2 {
            margin-top: 0;
        }
        .btn-primary {
            background-color: #5bc0de;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #46b8da;
        }
        .ferias-section {
            padding: 40px 20px;
            background-color: #fff;
        }
        .ferias-section h2 {
            text-align: center;
            color: #5bc0de;
            margin-bottom: 20px;
        }
        .ferias-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .feria {
            flex: 1 1 30%;
            margin: 10px;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            transition: transform 0.3s;
        }
        .feria img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .feria:hover {
            transform: scale(1.05);
        }
        .feria h3 {
            color: #5bc0de;
        }
        .feria p {
            color: #333;
        }
        .feria span {
            display: block;
            margin-top: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>Turismo Rural Comunitario</h1>
        </div>
        <nav>
            <a href="<?php echo site_url('welcome/login'); ?>" class="btn-login">Iniciar Sesión</a>
        </nav>
    </header>
    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>Descubre la Belleza de Nuestros Destinos Rurales</h2>
                <p>Explora experiencias auténticas y apoya a las comunidades locales.</p>
                <a href="<?php echo site_url('welcome/destinos'); ?>" class="btn btn-primary">Explorar Destinos</a>
            </div>
        </section>
        <section class="ferias-section">
            <h2>Ferias y Fiestas</h2>
            <div class="ferias-container">
                <?php foreach ($ferias as $feria): ?>
                    <div class="feria">
                        <img src="<?php echo base_url('assets/images/' . $feria['imagen']); ?>" alt="<?php echo $feria['nombre']; ?>">
                        <h3><?php echo $feria['nombre']; ?></h3>
                        <p><?php echo $feria['descripcion']; ?></p>
                        <span><?php echo $feria['fecha_inicio']; ?> - <?php echo $feria['fecha_fin']; ?></span>
                        <p>Lugar: <?php echo $feria['lugar']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>
