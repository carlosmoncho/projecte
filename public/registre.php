<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
$errors = [];
$paginaView = 'registre';
if (isPost() && cfsr()){
    try {
        $usuari =  isRequired('nombreUsuario');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $email = isRequired('email');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $contrasenya1 = isRequired('contraseña1');
        $contrasenya1 = contrasenyaSegura('contraseña1');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoFitField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $contrasenya2 = isRequired('contraseña2');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        compararContrseñas('contraseña1','contraseña2');
    }catch (\BatoiPOP\Exceptions\passwordIsNotSame $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    if (!count($errors)){
        $paginaView = 'resultadoRegister';
        loadView('index',compact('menu','usuari','email','contrasenya1','contrasenya2','paginaView'));
    }else{
        loadView('index',compact('menu', 'errors','paginaView'));
    }
}else{
    loadView('index',compact('menu','errors', 'paginaView'));
}