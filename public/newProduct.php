<?php
session_start();
require_once ("../kernel.php");
require_once($route_config.'menu.php');
require_once($route_config.'categories.php');
use BatoiPOP\Category;
$errors = [];
$categories = $query->selectAll('categories');
$paginaView = 'newProduct';
if (isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
}

if (isPost() && cfsr() ){
    $user = $user->id;
    try {
        $name = isRequired('nom');
        $name = nameLenght('nom');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoFitField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $original_price = isRequired('preuOriginal');
        $original_price = isNumeric('preuOriginal');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $discount_price = isNumeric('preuDescompte');

    }catch (\BatoiPOP\Exceptions\NoNumericField $e){

        $errors[$e->getField()] = $e->getMessage();
    }
    try {
        $stars = isNumeric('stars');
        $stars = filtroStars('stars');
    }catch (\BatoiPOP\Exceptions\NoNumericField $e){
        $errors[$e->getField()] = $e->getMessage();
    }catch (\BatoiPOP\Exceptions\NoFitField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    $category = $_POST['categories'];
    $sale = $_POST['sale'];
    try {
        $img = saveFile('foto','image/png','img');
    }catch (\BatoiPOP\Exceptions\isNotAnImageFile $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    if (!count($errors)){
        $paginaView = 'section';
        $camps = compactCamps($name,$original_price,$discount_price,$stars,$sale,$img,$category,$user);
        $query->insert('ofertes',$camps);
        header('location:/load.php');
    }else{
        loadView('index',compact('menu','errors', 'paginaView','categories'));

    }
}else{
    loadView('index',compact('menu','errors', 'paginaView','categories'));
}

function categoriesArray($categories){
    $categoriesObjects = [];
    foreach ($categories as $categoria){
        $category = new Category($categoria['id'],$categoria['name']);
        array_push($categoriesObjects,$category);
    }
    return $categoriesObjects;
}

function compactCamps($name, $original_price, $discount_price, $stars,$sale, $img,$category, $user){
    if (empty($discount_price) && empty($img)){
        return compact('name', 'original_price', 'stars','sale','category','user');
    }else if(empty($discount_price)){
        return compact('name', 'original_price', 'stars','sale', 'img','category','user');
    }else if(empty($img)){
        return compact('name', 'original_price', 'discount_price', 'stars','sale','category','user');
    }else{
        return compact('name', 'original_price', 'discount_price', 'stars','sale', 'img','category','user');
    }
}