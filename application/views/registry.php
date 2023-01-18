<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/resource/styles/style_registry.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('/resource/images/logo_web_casa.png') ?>" />
    <title>Registro</title>
</head>

<body class=" grey lighten-4">

    <div class="container">
        <div class="c-header">
            <img src="<?= base_url('/resource/images/logo_web_casa.png') ?>" alt="logo webcasa.mx">
            <h2>Bienvenido a Web Casa</h2>
        </div>
        <h5>Por favor proporcione los datos solicitados</h5>
        <form action="<?= base_url('index.php/RegistryProcess/registry_user') ?>" method="post" class="col s12">
            <div class="row c-form">
                <div class="input-field col s12 m6 l12">
                    <i class="material-icons prefix">account_circle</i>
                    <label for="nameUser">Nombre :</label>
                    <input type="text" name="nameUser" id="nameUser" class="validate" value="<?= set_value('nameUser'); ?>">
                    <?= form_error('nameUser', '<div class="c-login__error">', '</div>') ?>
                </div>
                <div class="input-field col s10 m6 l12 offset-s2">
                    <label for="lastNameUser">Apellido :</label>
                    <input type="text" name="lastNameUser" id="lastNameUser" class="validate" value="<?= set_value('lastNameUser'); ?>">
                    <?= form_error('lastNameUser', '<div class="c-login__error">', '</div>') ?>
                </div>
                <div class="input-field col s12 m6 l12 ">
                    <i class="material-icons prefix">lock</i>
                    <label for="passwordUser">Contraseña</label>
                    <input type="password" name="passwordUser" id="passwordUser" class="validate" value="<?= set_value('passwordUser'); ?>">
                    <?= form_error('passwordUser', '<div class="c-login__error">', '</div>') ?>
                </div>
                <div class="input-field col s10 m6 l12 offset-s2">
                    <label for="confirmPasswordUser">Confirmar Contraseña</label>
                    <input type="password" name="confirmPasswordUser" id="confirmPasswordUser" sclass="validate" value="<?= set_value('confirmPasswordUser'); ?>">
                    <?= form_error('confirmPasswordUser', '<div class="c-login__error">', '</div>') ?>
                </div>
                <button class="btn waves-effect waves-light grey darken-2 col s8 m4 l4 offset-l4 offset-s2 offset-m4 center-align c-button" type="submit"><i class="material-icons left">person_add</i>Registrar</button>
            </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>