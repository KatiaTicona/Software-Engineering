<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre_destino; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }
        
        .info-card {
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .info-card h2 {
            margin-top: 0;
        }

        .info-card p {
            margin: 5px 0;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6600;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        
        .btn:hover {
            background-color: #e65c00;
        }


        .descripcion, .lugares {
            margin-top: 20px;
        }
        

        .lugar {
            margin-bottom: 20px;
        }

        .lugar img {
            max-width: 100%;
            border-radius: 10px;
        }

        #map {
            height: 400px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $nombre_destino; ?></h1>
        <div class="info-card">
            <h2>Ubicaci√≥n en <?php echo $nombre_destino; ?></h2>
            <p><strong>Regi√≥n:</strong> Puno</p>
            <p><strong>Provincia:</strong> <?php echo $nombre_destino; ?></p>
            <p><strong>Latitud:</strong> <?php echo $latitud; ?></p>
            <p><strong>Longitud:</strong> <?php echo $longitud; ?></p>
            <p><strong>Altitud:</strong> 3868 msnm</p>
            <button class="btn" data-toggle="modal" data-target="#mapModal">Ver Mapa</button>
        </div>
        <div class="descripcion">
            <h2>Descripci√≥n</h2>
            <p><?php echo $descripcion; ?></p>
        </div>
        <div class="lugares">
            <h2>Lugares Tur√≠sticos</h2>
            <?php foreach ($lugares as $lugar): ?>
            <div class="lugar">
                <h3><?php echo $lugar['nombre']; ?></h3>
                <p><?php echo $lugar['descripcion']; ?></p>
                <img src="<?php echo base_url('assets/images/') . $lugar['imagen']; ?>" alt="<?php echo $lugar['nombre']; ?>">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <h2>Reserva tu visita</h2>
        <form action="<?php echo site_url('welcome/submit_reserva'); ?>" method="post">
            <input type="hidden" name="destino_id" value="<?php echo $destino_id; ?>">
            <input type="hidden" name="usuario_id" value="<?php echo $this->session->userdata('user_id'); ?>"> <!-- Aseg®≤rate de que el usuario est®¶ logueado y de obtener su ID -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="telefono">Tel®¶fono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <label for="fecha">Fecha de Reserva:</label>
            <input type="date" id="fecha" name="fecha" required>
            <button type="submit">Reservar</button>
        </form>
    </div>
    
    

    <!-- Modal -->
    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mapModalLabel">Mapa de <?php echo $nombre_destino; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Maps script -->
    <script>
        function initMap() {
            const location = { lat: <?php echo $latitud; ?>, lng: <?php echo $longitud; ?> };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: location,
            });

            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: "<?php echo $nombre_destino; ?>"
            });
        }

        $('#mapModal').on('shown.bs.modal', function () {
            initMap();
        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzXqbzYkEMQRXrje8_s30e2QdRfIhPXRs&callback=initMap"></script>
</body>
</html>
