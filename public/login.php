<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
$errors = [];
$paginaView = 'login';
if (isPost() && cfsr()){
    try {
        $usuari =  isRequired('usuarioLogin', $errors);
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $contrasenya = isRequired('contraseñaLogin',$errors);
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    if (!count($errors)){
        $paginaView = 'resultadoLogin';
        loadView('index',compact('menu','usuari','contrasenya','paginaView'));
    }else{
        loadView('index',compact('menu', 'errors','paginaView'));
    }
}else{
    loadView('index',compact('menu','errors', 'paginaView'));
}