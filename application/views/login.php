<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?= base_url('/resource/styles/style_login.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" type="image/png" href="<?= base_url('/resource/images/logo_web_casa.png') ?>" />
</head>

<body>
    <div class="back_1"></div>
    <div class="back_2"></div>
    <div class="back_3"></div>
    <div class="back_4"></div>
    <div class="back_5"></div>
    <div class="back_6"></div>
    <div class="back_7"></div>
    <form action="<?= base_url('index.php/LoginProcess/login_start') ?>" method="post">
        <div class="c-login">
            <img src="<?= base_url('/resource/images/logo_web_casa.png') ?>" class="c-login__logo" alt="logo webcasa.mx">
            <h1 class="c-login__text">Iniciar Sesión</h1>
            <div class="c-login__item">
                <i class="fas fa-user-circle c-login__icon"></i>
                <input class="c-login__input" name="nameUser" type="text" placeholder="Usuario" value="<?= set_value('nameUser'); ?>">
            </div>
            <?= form_error('nameUser', '<div class="c-login__error">', '</div>') ?>
            <div class="c-login__item">
                <i class="fas fa-lock c-login__icon"></i>
                <input class="c-login__input" name="passwordUser" type="password" placeholder="Contraseña">
            </div>
            <?= form_error('passwordUser', '<div class="c-login__error">', '</div>') ?>
            <div class="c-login__sign-in">
                <a class="c-login__link" href="<?= base_url('index.php/RegistryProcess') ?>"><i class="fas fa-sign-in-alt"></i> Registrarse</a>
            </div>
            <?php
            if (isset($login_error) and $login_error == TRUE) { ?>
                <div class="c-login__error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Datos Incorrectos</span>
                </div>

            <?php
            } else {
            }
            ?>
            <input class="c-login__button" type="submit" type="button" value="Ingresar">
        </div>
    </form>
</body>

</html>