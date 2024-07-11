<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reservar en <?php echo $nombre_destino; ?></h1>
        <?php if ($this->session->flashdata('success')): ?>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
         <form action="<?php echo site_url('welcome/submit_reserva'); ?>" method="post">
            <input type="hidden" name="destino_id" value="<?php echo $destino_id; ?>">
            <input type="hidden" name="usuario_id" value="<?php echo $this->session->userdata('user_id'); ?>"> <!-- Asegúrate de que el usuario esté logueado y de obtener su ID -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            <input type="hidden" name="usuario_id" value="<?php echo $this->session->userdata('usuario_id'); ?>">
            <input type="hidden" name="destino_id" value="1"> <!-- Ajusta esto según tu lógica -->
            <button type="submit" class="btn-primary">Reservar</button>
        </form>
        <br>
        <form id="payment-form">
            <div id="card-element" class="StripeElement">
                <!-- Stripe Element will be inserted here -->
            </div>
            <div id="card-errors" role="alert" class="error"></div>
            <button id="submit-button" class="btn-secondary">Pagar con Tarjeta</button>
        </form>
    </div>

    <script>
        // Initialize Stripe
        var stripe = Stripe('<?php echo $this->config->item('stripe_publishable_key'); ?>');
        var elements = stripe.elements();

        // Create an instance of the card Element
        var card = elements.create('card');
        card.mount('#card-element');

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createPaymentMethod('card', card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.paymentMethod.id);
                }
            });
        });

        function stripeTokenHandler(paymentMethodId) {
            fetch('<?php echo base_url('StripePayments/create_payment_intent'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    payment_method_id: paymentMethodId
                })
            }).then(function(result) {
                return result.json();
            }).then(function(data) {
                if (data.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = data.error;
                } else {
                    window.location.href = '<?php echo base_url('StripePayments/success'); ?>';
                }
            });
        }
    </script>
</body>
</html>

