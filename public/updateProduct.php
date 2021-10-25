<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
use BatoiPOP\Category;
$errors = [];
$paginaView = 'updateProduct';

if (isPost() && cfsr() && empty($_POST['update'])){
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
    $sale = $_POST['sale'];
    try {
        $img = saveFile('foto','image/png','img');
    }catch (\BatoiPOP\Exceptions\isNotAnImageFile $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    if (!count($errors)){
        $camps = compactCamps($name,$original_price,$discount_price,$stars,$sale,$img);
        $query->updateProduct('productes',$_POST['id'],$camps);
        header('location:/load.php');
    }else{
        loadView('index',compact('menu','errors', 'paginaView'));
    }
}else{
    $product = $query->findById('productes',$_POST['update']);
    loadView('index',compact('menu','errors', 'paginaView','product'));
}

function compactCamps($name, $original_price, $discount_price, $stars,$sale, $img){
    if (empty($discount_price) && empty($img)){
        return  createUpdate(compact('name', 'original_price', 'stars','sale'));
    }else if(empty($discount_price)){
        return createUpdate(compact('name', 'original_price', 'stars','sale', 'img'));
    }else if(empty($img)){
        return createUpdate(compact('name', 'original_price', 'discount_price', 'stars','sale'));
    }else{
        return createUpdate(compact('name', 'original_price', 'discount_price', 'stars','sale', 'img'));
    }
}
function createUpdate($camps){
    $string='';
    foreach ($camps as $key => $camp){
        if ($camp === end($camps)){
            $string .= "`$key` = '$camp'";
        }else {
            $string .= "`$key` = '$camp', ";
        }
    }
    return $string;
}
function categoriesArray($categories){
    $categoriesObjects = [];
    foreach ($categories as $categoria){
        $category = new Category($categoria['id'],$categoria['name']);
        array_push($categoriesObjects,$category);
    }
    return $categoriesObjects;
}