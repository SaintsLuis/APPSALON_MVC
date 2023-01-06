<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

    <!-- Contenedor Principal -->
    <div class="contenedor-app">
        <div class="imagen"></div>
        <div class="app">
            <!-- Desde Router.php -->
            <?php echo $contenido; ?>
        </div>
    </div>
    
    <?php 
        //index.php\cita
        echo $script ?? '';
    ?>
            
</body>
</html>