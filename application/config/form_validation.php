<?php
$config = array(
        'login' => array(
                array(
                        'field' => 'nameUser',
                        'label' => 'Nombre de usuario',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'Ingresé su %s',
                        ),
                ),
                array(
                        'field' => 'passwordUser',
                        'label' => 'Contraseña',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'Ingresé su %s',
                        ),
                )
        ),
        'registry' => array(
                array(
                        'field' => 'nameUser',
                        'label' => 'Nombre de usuario',
                        'rules' => 'required|is_unique[User.nameUser]|trim|callback_string_check|alpha',
                        'errors' => array(
                                'required' => 'El %s es necesario',
                                'is_unique' => 'El usuario ya existe',
                                'string_check' => 'El %s no tiene que incluir espacios',
                                'alpha' => 'El %s solo puede contener caracteres alfabéticos',
                        ),
                ),
                array(
                        'field' => 'lastNameUser',
                        'label' => 'Apellido',
                        'rules' => 'required|callback_string_check|alpha',
                        'errors' => array(
                                'required' => 'Su %s es necesario',
                                'string_check' => 'El %s no tiene que incluir espacios',
                                'alpha' => 'El %s solo puede contener caracteres alfabéticos',
                        ),
                ),
                array(
                        'field' => 'passwordUser',
                        'label' => 'Contraseña',
                        'rules' => 'required|callback_string_check',
                        'errors' => array(
                                'required' => 'La %s es necesaria',
                                'string_check' => 'La %s no tiene que incluir espacios',
                        ),
                ),
                array(
                        'field' => 'confirmPasswordUser',
                        'label' => 'Confirmar Contraseña',
                        'rules' => 'required|matches[passwordUser]',
                        'errors' => array(
                                'required' => 'Es necesario %s',
                                'matches' => 'Las contrseñas no coinciden',
                        ),
                )
        )
);

?>