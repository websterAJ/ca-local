<?php include 'script/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Control de acceso Movistar</title>
    <link rel="stylesheet" href="<?= _BASE_URL_?>css/bootstrap.min.css">
    <link href="<?= _BASE_URL_?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="<?= _BASE_URL_?>js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" href="<?= _BASE_URL_?>css/login.css">
    <link rel="stylesheet" href="<?= _BASE_URL_?>style.css">
</head>
<body class="bg-login">
    <div class="form-signin panel text-center">
        <form action="script/login.php" method="POST">
            <img class="mb-4 logo-acceso" src="img/logo.png">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
            <div class="form-group">
                <label for="user" class="sr-only">Usuario</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" required autofocus>
            </div>
            <div class="form-group">
                 <label for="pass" class="sr-only">Contraseña</label>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block " type="submit">Iniciar</button>
            <p class="mt-5 mb-3 text-black">&copy; <?php echo date("Y") ?></p>
        </form>
    </div>
</body>
<script src="<?= _BASE_URL_?>js/bootstrap.min.js"></script>
</html>