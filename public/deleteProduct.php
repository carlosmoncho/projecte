<?php
require_once ("../kernel.php");
require_once($route_config.'menu.php');
require_once($route_config.'categories.php');
$query->deleteProduct('productes', $_POST['eliminar'] );
$paginaView = 'load';
$productos = $query->selectAll('productes');
header('location:/load.php');