<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
$errors = [];
$paginaView = 'login';
if (isPost() && cfsr()){
    $usuari =  isRequired('usuarioLogin', $errors);
    $contrasenya = isRequired('contraseñaLogin',$errors);
    if (!count($errors)){
        $paginaView = 'resultadoLogin';
        loadView('index',compact('menu','usuari','contrasenya','paginaView'));
    }else{
        loadView('index',compact('menu', 'errors','paginaView'));
    }
}else{
    loadView('index',compact('menu','errors', 'paginaView'));
}