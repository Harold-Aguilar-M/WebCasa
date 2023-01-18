<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/resource/styles/style_home.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('/resource/images/logo_web_casa.png') ?>" />
    <title>Casa</title>
</head>

<body class=" grey lighten-4">

    <div class="center charge" id="charge">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="hide" id="content_page">

        <div class="navbar-fixed">
            <nav class="nav-wrapper grey">
                <a href="<?= base_url() ?>" class="brand-logo"><img src="<?= base_url('/resource/images/logo_web_casa.png') ?>" alt="logo webcasa.mx" class="img"></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?= base_url('index.php/LoginProcess/logout') ?>"><i class="material-icons left">forward</i>Salir</a></li>
                </ul>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="<?= base_url('index.php/LoginProcess/logout') ?>"><i class="material-icons left">forward</i>Salir</a></li>
        </ul>

        <div class="container row">

            <br>
            <h3>Bienvenido <?= ucwords($this->session->userdata('nameUser')); ?> <i class="material-icons">pan_tool</i></h3>
            <br>

            <?php
            if (isset($file_name) and isset($file_extension)) {
                foreach ($file_name as $f_name) {
                    $f_extension = current($file_extension);
            ?>
                    <div class="col s12 m6 l4">
                        <div class="card z-depth-3">
                            <div class="card-image">
                                <img src="<?= base_url('/tmp/') . $f_name . '.' . $f_extension ?>" class="c-files" alt="Imagen no disponible">
                                <h6 class="card-title"><?= $f_name ?></h6>
                            </div>
                            <div class="card-action">
                                <blockquote><?= '.' . $f_extension ?></blockquote>
                                <a href="<?= base_url('index.php/Home/download_file_ftp/') . $f_name . '.' . $f_extension ?>" class="btn-floating tooltipped z-depth-5 blue darken-4" data-position="bottom" data-tooltip="Descargar"><i class="material-icons">file_download</i></a>
                                <button data-target="idRename" class="btn-edit btn-floating tooltipped modal-trigger z-depth-5 amber darken-1" data-position="bottom" data-tooltip="Renombrar" f_name="<?= $f_name ?>" f_extension="<?= $f_extension ?>">
                                    <i class="material-icons">mode_edit</i>
                                </button>
                                <button data-target="idDelete" class="btn-delete btn-floating tooltipped modal-trigger z-depth-5 red" data-position="bottom" data-tooltip="Eliminar" f_name="<?= $f_name ?>" f_extension="<?= $f_extension ?>">
                                    <i class="material-icons">delete</i>
                                </button>
                            </div>
                        </div>
                    </div>
            <?php
                    next($file_extension);
                }
            }
            ?>

            <div class="fixed-action-btn ">
                <a href="#idUpload" class="btn-floating btn-large tooltipped modal-trigger z-depth-5 blue darken-4" data-position="left" data-tooltip="Subir archivo">
                    <i class="large material-icons">file_upload</i>
                </a>
            </div>

            <div id="idUpload" class="modal">
                <div class="modal-content">
                    <form action="upload_file_ftp" method="POST" enctype="multipart/form-data">
                        <div class="file-field input-field">
                            <div class="btn green accent-4">
                                <span>Seleccionar Archivo</span>
                                <input type="file" id="uploadedfile" class="validate" required name="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path" type="text" name="file">
                            </div>
                        </div>
                        <span class="center">
                            <h6 id="idUploadError" class="hide">El archivo es demasiado grande! Seleccione otro por favor.</h6>

                            <blockquote id="idUploadError_2" class="hide">
                                Archivos inferiores a 20 Mega bytes
                            </blockquote>

                            <button id="idUploadBtn" class="waves-effect waves-light btn disabled green accent-4" type="submit">
                                <i class="material-icons left">check_circle</i>Subir
                            </button>
                        </span>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn modal-close red"><i class="material-icons left">cancel</i> Cancelar</a>
                </div>
            </div>

            <div id="idRename" class="modal">
                <div class="modal-content">
                    <form action="modify_file_ftp" method="post">
                        <div class="input-field">
                            <i class="material-icons prefix">textsms</i>
                            <label for="new_name">Nuevo nombre</label>
                            <input class="hide" type="text" name="old_name" id="old_name" value="">
                            <input class="hide" type="text" name="file_extension" id="file_extension" value="">
                            <input type="text" name="new_name" id="new_name" class="validate" required>
                        </div>
                        <button class="waves-effect  waves-light btn green accent-4" type="submit">
                            <i class="material-icons left">check_circle</i>Renombrar
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn modal-close red"><i class="material-icons left">cancel</i>Cancelar</a>
                </div>
            </div>

            <div id="idDelete" class="modal">
                <div class="modal-content center">
                    <h5>Estas seguro de eliminar este archivo</h5>
                    <form action="delete_file_ftp" method="post">
                        <input class="hide" type="text" name="file_name_delete" id="file_name_delete" value="">
                        <input class="hide" type="text" name="file_extension_delete" id="file_extension_delete" value="">
                        <button class="waves-effect  waves-light btn green accent-4" type="submit">
                            <i class="material-icons left">check_circle</i>Eliminar
                        </button>
                    </form>
                    <div class="modal-footer">
                        <button class="btn modal-close red">
                            <i class="material-icons left">cancel</i>Cancelar
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <footer class="page-footer grey">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12 center">
                    <a href="<?= base_url() ?>"><img src="<?= base_url('/resource/images/logo_web_casa.png') ?>" alt="logo webcasa.mx"></a>
                    </div>
                    <div class="col l4 offset-l2 s12 center">
                        <br><br>
                        Página creada por Harold Aguila Mejia <br><br>
                        UBBJG - Ingeniería en Computación <br><br>
                        Diseño y Administración de Redes de Computadoras
                        
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2014 Copyright - www.webcasa.mx
                </div>
            </div>
        </footer>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?= base_url('/resource/js/app.js') ?>"></script>

</body>

</html>

<!-- codigo viejo -->