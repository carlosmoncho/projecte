<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php $menu[0]['Home']?>"><?= key($menu[0])?></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="<?php $menu[1]['Show']?>" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= key($menu[1])?></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($menu[1]['Show'] as $item => $item2){ ?>
                            <li><a class="dropdown-item" href="<?=$item2?>"><?=$item?></a></li>
                        <?php }?>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi bi-person"></i>
                    Login
                </button>
            </form>
        </div>
    </div>
</nav>