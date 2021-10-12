<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
require_once($route_config.'categories.php');
use BatoiPOP\Category;
$errors = [];
$categoriesObjects = [];
$paginaView = 'newProduct';
foreach ($categories as $categoria){
    $category = new Category($categoria['id'],$categoria['name']);
    array_push($categoriesObjects,$category);
}
if (isPost() && cfsr()){
    try {
        $nom = isRequired('nom',$errors);
        $nom = nameLenght('nom',$errors);
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoFitField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $preuOriginal = isRequired('preuOriginal',$errors);
        $preuOriginal = isNumeric('preuOriginal',$errors);
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $preuDescompte = isNumeric('preuDescompte',$errors);
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){

        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $estrelles = isNumeric('stars',$errors);
        $estrelles = filtroStars('stars',$errors);
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoFitField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    $categoria = $_POST['categories'];
    try {
        $fitxer = saveFile('foto','image/png','img',$errors);
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