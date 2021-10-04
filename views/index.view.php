<?php
$pagina = $paginaView;
require_once('partials/head.view.php');
require_once('partials/navigation.view.php');
require_once('partials/header.view.php');
require_once("partials/$pagina.view.php");
require_once('partials/footer.view.php');
