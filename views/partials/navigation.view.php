<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <?php foreach ($menu as $group): ?>
                    <?php $nameLink = key($group);  ?>
                    <?php $link = $group[$nameLink]; ?>
                    <?php if (!is_array($link)): ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                                href="<?= $link ?>">
                                <?= $nameLink ?></a></li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $nameLink ?></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach ($link as $subName => $subLink):?>
                                    <li><a class="dropdown-item" href="<?= $subLink ?>?nombre=<?=$subName?>" ><?= $subName ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif ?>
                <?php endforeach; ?>
            </ul>
            <?php if (!empty($user)){?>
                <i class="bi bi-person"></i>
                <?= $user->name?>
                <p>&nbsp; &nbsp; &nbsp;</p>
                <form class="d-flex" action="/logout.php" >
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi bi-person"></i>
                        Logout
                    </button>
                </form>
            <?php }else{?>
                <form class="d-flex" action="/login.php" >
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi bi-person"></i>
                        Login
                    </button>
                </form>
            <?php }?>
        </div>
    </div>
</nav>