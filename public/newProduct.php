<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
$errors = [];
$paginaView = 'newProduct';
if (isPost() && cfsr()){
    $nom = isRequired('nom',$errors);
    $nom = nameLenght('nom',$errors);
    $preuOriginal = isRequired('preuOriginal',$errors);
    $preuOriginal = isNumeric('preuOriginal',$errors);
    $preuDescompte = isNumeric('preuDescompte',$errors);
    $estrelles = isNumeric('stars',$errors);
    $estrelles = filtroStars('stars',$errors);
    $categoria = $_POST['categories'];
    $fitxer = saveFile('foto','image/png','img',$errors);
    if (!count($errors)){
        $paginaView = 'mostrarNewProduct';
        loadView('index',compact('menu','nom','preuOriginal', 'preuDescompte', 'estrelles','fitxer','categoria','paginaView'));
    }else{
        loadView('index',compact('menu','errors', 'paginaView'));
    }
}else{
    loadView('index',compact('menu','errors', 'paginaView'));
}