<?php
session_start();
require_once ("../kernel.php");
require_once($route_config.'menu.php');
require_once($route_config.'categories.php');
$paginaView = 'load';
$categories = $query->selectAll('categories');
$productos = $query->selectAll('productes');
if (isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
    loadView('index',compact('menu','paginaView','productos','user','categories'));
}
loadView('index',compact('menu','paginaView','productos','categories'));