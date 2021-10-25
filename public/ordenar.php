<?php
require_once ('../kernel.php');
require_once($route_config.'products.php');
require_once($route_config.'menu.php');
use BatoiPOP\Producte;
$nombre = $_GET['nombre'];
$paginaView = 'section';
if($nombre == 'All Products') {
    $productos = $query->selectAll('productes');
}elseif($nombre == 'Populars'){
    $productos = $query->orderByStars('productes');
}elseif ($nombre == 'News'){
    $productos = $query->orderByDate('productes');
}
loadView('index',compact('menu','products','paginaView','productos'));