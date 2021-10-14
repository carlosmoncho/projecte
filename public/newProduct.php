<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
require_once($route_config.'categories.php');
use BatoiPOP\Category;
$errors = [];
$categoriesObjects = categoriesArray($categories);
$paginaView = 'newProduct';

if (isPost() && cfsr()){
    try {
        $nom = isRequired('nom');
        $nom = nameLenght('nom');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoFitField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $preuOriginal = isRequired('preuOriginal');
        $preuOriginal = isNumeric('preuOriginal');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $preuDescompte = isNumeric('preuDescompte');
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){

        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $estrelles = isNumeric('stars');
        $estrelles = filtroStars('stars');
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoFitField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    $categoria = $_POST['categories'];
    try {
        $fitxer = saveFile('foto','image/png','img');
    }catch (\BatoiPOP\Exceptions\isNotAnImageFile $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    if (!count($errors)){
        $paginaView = 'formulario';
        loadView('index',compact('menu','nom','preuOriginal', 'preuDescompte', 'estrelles','fitxer','categoria','paginaView'));
    }else{
        loadView('index',compact('menu','errors', 'paginaView','categoriesObjects'));
    }
}else{
    loadView('index',compact('menu','errors', 'paginaView','categoriesObjects'));
}

function categoriesArray($categories){
    $categoriesObjects = [];
    foreach ($categories as $categoria){
        $category = new Category($categoria['id'],$categoria['name']);
        array_push($categoriesObjects,$category);
    }
    return $categoriesObjects;
}