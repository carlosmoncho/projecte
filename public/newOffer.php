<?php
session_start();
require_once ("../kernel.php");
require_once($route_config.'menu.php');
require_once($route_config.'categories.php');
$errors = [];
$paginaView = 'newOffer';
if (isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
}

if (isPost() && cfsr() && empty($_POST['offer'])){
    $user = $user->id;
    try {
        $producte = isRequired('producte');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $preu = isRequired('preu');
        $preu = isNumeric('preu');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){
        $errors[$e->getField()] = $e->getMessage();
    }

    if (!count($errors)){
        $paginaView = 'section';
        $camps = compact('user','producte','preu');
        $query->insert('ofertes',$camps);
        header('location:/load.php');
    }else{
        $product = $query->findById('productes',$_POST['offer']);
        loadView('index',compact('menu','errors', 'paginaView','product'));

    }
}else{
    $product = $query->findById('productes',$_POST['offer']);
    loadView('index',compact('menu','errors', 'paginaView','product'));
}