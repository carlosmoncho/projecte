<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
$categories = $query->selectAll('categories');
$product = $query->findById('productes',$_POST['show']);
$paginaView = 'showProducte';
loadView('index',compact('menu', 'product','paginaView','categories'));