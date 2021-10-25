<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
require_once($route_config.'categories.php');
$paginaView = 'load';
$productos = $query->selectAll('productes');
loadView('index',compact('menu','paginaView','productos'));