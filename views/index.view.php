<?php
$pagina = $paginaView;
if ($pagina === 'index'){
    require_once('partials/head.view.php');
    require_once('partials/navigation.view.php');
    require_once('partials/header.view.php');
    require_once('partials/section.view.php');
    require_once('partials/footer.view.php');
}
if ($pagina === 'mostrarNewProduct'){
    require_once('partials/head.view.php');
    require_once('partials/navigation.view.php');
    require_once('partials/header.view.php');
    require_once('partials/formulario.view.php');
    require_once('partials/footer.view.php');
}
if($pagina === 'newProduct'){
    require_once('partials/head.view.php');
    require_once('partials/navigation.view.php');
    require_once('partials/header.view.php');
    require_once('partials/newProduct.view.php');
    require_once('partials/footer.view.php');
}
if($pagina === 'login'){
    require_once('partials/head.view.php');
    require_once('partials/navigation.view.php');
    require_once('partials/header.view.php');
    require_once('partials/login.view.php');
    require_once('partials/footer.view.php');
}
if($pagina === 'mostrarLogin'){
    require_once('partials/head.view.php');
    require_once('partials/navigation.view.php');
    require_once('partials/header.view.php');
    require_once('partials/resultadoLogin.php');
    require_once('partials/footer.view.php');
}
if($pagina === 'registre'){
    require_once('partials/head.view.php');
    require_once('partials/navigation.view.php');
    require_once('partials/header.view.php');
    require_once('partials/registre.view.php');
    require_once('partials/footer.view.php');
}
if($pagina === 'mostraRegistre'){
    require_once('partials/head.view.php');
    require_once('partials/navigation.view.php');
    require_once('partials/header.view.php');
    require_once('partials/resultadoRegister.php');
    require_once('partials/footer.view.php');
}