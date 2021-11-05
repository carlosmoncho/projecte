<?php
require_once ('../kernel.php');
require_once($route_config.'products.php');
require_once($route_config.'menu.php');

$paginaView = 'forgot';
if (isGet()) {
    $email = $_GET['email'];
    $token = $_GET['token'];
    $userValidator = $query->validationEmail('users', $email, $token);
    loadView('index', compact('menu', 'userValidator', 'paginaView'));
}

if (isPost()){
    $errors = [];
    try {
        $email =  isRequired('user');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $password =password_hash( isRequired('password1'),PASSWORD_DEFAULT);
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $password2 =  isRequired('password2');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        compararContrseñas('password1','password2');
    }catch (\BatoiPOP\Exceptions\passwordIsNotSame $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    if (!count($errors)){
        $idUser = $query->findByEmail('users', $email);
        $contrasenyaNova = createUpdate(compact('password'));
        var_dump($contrasenyaNova);
        $query->update('users',$idUser->id,$contrasenyaNova);
        header('location:/login.php');
    }else{
        echo ('holaaaaaaaaaa');
    }
}