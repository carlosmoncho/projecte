<?php
require_once ('../kernel.php');
require_once($route_config.'products.php');
require_once($route_config.'menu.php');
use BatoiPOP\Producte;
$productosObject = productsArray($products);
$paginaView = 'section';
loadView('index',compact('menu','products','paginaView','productosObject'));

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