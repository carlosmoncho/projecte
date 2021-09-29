<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
$errors = [];
$paginaView = 'registre';
if (isPost() && cfsr()){
    $usuari =  isRequired('nombreUsuario', $errors);
    $email = isRequired('email', $errors);
    $contrasenya1 = isRequired('contraseña1',$errors);
    $contrasenya1 = contrasenyaSegura('contraseña1',$errors);
    $contrasenya2 = isRequired('contraseña2',$errors);
    compararContrseñas('contraseña1','contraseña2',$errors);
    if (!count($errors)){
        $paginaView = 'mostraRegistre';
        loadView('index',compact('menu','usuari','email','contrasenya1','contrasenya2','paginaView'));
    }else{
        loadView('index',compact('menu', 'errors','paginaView'));
    }
}else{
    loadView('index',compact('menu','errors', 'paginaView'));
}