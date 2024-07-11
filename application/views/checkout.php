<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar con PayPal</title>
</head>
<body>
    <form action="<?php echo site_url('payments/create_payment'); ?>" method="post">
        <button type="submit">Pagar con PayPal</button>
    </form>
</body>
</html>
