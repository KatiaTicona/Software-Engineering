<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinos en Puno</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
            padding: 20px;
            background-color: #007bff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }
        .destinos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            justify-content: center;
        }
        .destino {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .destino img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .destino:hover img {
            transform: scale(1.1);
        }
        .destino-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px;
            text-align: center;
            transition: background 0.3s ease;
        }
        .destino:hover .destino-info {
            background: rgba(0, 0, 0, 0.7);
        }
        .destino-info h2 {
            margin: 0;
            font-size: 18px;
        }
        .destino-info p {
            margin: 5px 0 0;
            font-size: 14px;
        }
        .btn-back {
            margin-bottom: 20px;
        }
        #map {
            height: 500px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="<?php echo site_url('welcome/index'); ?>" class="btn btn-primary btn-back">Volver al Inicio</a>
        <h1>Destinos en Puno</h1>
        <div class="destinos-grid">
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/1'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Azángaro">
                    <div class="destino-info">
                        <h2>Azángaro</h2>
            
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/2'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Carabaya">
                    <div class="destino-info">
                        <h2>Carabaya</h2>
                
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/3'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Chucuito">
                    <div class="destino-info">
                        <h2>Chucuito</h2>
                 
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/4'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="El Collao">
                    <div class="destino-info">
                        <h2>El Collao</h2>
           
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/5'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Huancane">
                    <div class="destino-info">
                        <h2>Huancane</h2>
                    
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/6'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Lampa">
                    <div class="destino-info">
                        <h2>Lampa</h2>
              
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/7'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Melgar">
                    <div class="destino-info">
                        <h2>Melgar</h2>
                 
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/8'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Moho">
                    <div class="destino-info">
                        <h2>Moho</h2>
               
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/9'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Puno">
                    <div class="destino-info">
                        <h2>Puno</h2>
                 
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/10'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="San Antonio de Putina">
                    <div class="destino-info">
                        <h2>San Antonio de Putina</h2>
    
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/11'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="San Roman">
                    <div class="destino-info">
                        <h2>San Roman</h2>
                   
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/12'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Sandia">
                    <div class="destino-info">
                        <h2>Sandia</h2>
              
                    </div>
                </a>
            </div>
            <div class="destino">
                <a href="<?php echo site_url('welcome/detalle_destino/13'); ?>">
                    <img src="https://punovirtual.ed.pe/assets/images/azangaro.jpeg" alt="Yunguyo">
                    <div class="destino-info">
                        <h2>Yunguyo</h2>
                  
                    </div>
                </a>
            </div>
          
        </div>
        <div id="map"></div>
    </div>
        

    <!-- Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Maps script -->
    <script>
        function initMap() {
            const puno = { lat: -15.8402, lng: -70.0219 }; // Coordenadas de Puno
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: puno
            });
            const marker = new google.maps.Marker({
                position: puno,
                map: map,
                title: 'Puno'
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzXqbzYkEMQRXrje8_s30e2QdRfIhPXRs&callback=initMap"></script>
</body>
</html>