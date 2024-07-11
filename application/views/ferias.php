<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferias y Fiestas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #d9534f;
            margin-bottom: 20px;
        }
        .ferias {
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
        .feria h2 {
            color: #d9534f;
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
    <div class="container">
        <h1>Ferias y Fiestas</h1>
        <div class="ferias">
            <?php foreach ($ferias as $feria): ?>
                <div class="feria">
                    <img src="<?php echo base_url('assets/images/' . $feria['imagen']); ?>" alt="<?php echo $feria['nombre']; ?>">
                    <h2><?php echo $feria['nombre']; ?></h2>
                    <p><?php echo $feria['descripcion']; ?></p>
                    <span><?php echo $feria['fecha_inicio']; ?> - <?php echo $feria['fecha_fin']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
