<?php
require_once ('../kernel.php');
require_once($route_config.'products.php');
require_once($route_config.'menu.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php loadView('head');?>
    <body>
        <!-- Navigation-->
        <?php include('../views/partials/navigation.view.php') ?>
        <!-- Header-->
        <?php loadView('header');?>
        <!-- Section-->
        <?php include('../views/partials/section.view.php') ?>
        <!-- Footer-->
        <?php loadView('footer');?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>