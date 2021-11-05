<?php
session_start();
require_once ('../kernel.php');
require_once($route_config.'products.php');
require_once($route_config.'menu.php');
use BatoiPOP\Producte;
$paginaView = 'section';
$productos = $query->selectAllLimit('productes',8);
if (isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
    loadView('index',compact('menu','paginaView','productos','user'));
}
loadView('index',compact('menu','paginaView','productos'));



function productsArray($products){
    $productosObject =[];
    $id = 0;
    foreach ($products as $producte){
        $id++;
        if (empty($producte['discount_price'])){
            $features = [
                'original_price' => $producte['original_price'],
                'stars' => $producte['stars'],
                'sale' => $producte['sale']
            ];
        }else{
            $features = [
                'original_price' => $producte['original_price'],
                'stars' => $producte['stars'],
                'discount_price' => $producte['discount_price'],
                'sale' => $producte['sale']
            ];
        }
        $producto = new Producte($id,$producte['name'],$features);
        array_push($productosObject,$producto);
    }
    return $productosObject;
}