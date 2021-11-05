<div style="background: aliceblue; margin: 50px" class="w-50 p-3">
    <?php
    if (!empty($errors)){
        foreach ($errors as $error):?>
            <p><?=$error?></p>
        <?php endforeach;?>
    <?php }?>
    <form method="POST" action="login.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputusuarioLogin">Usuari:</label>
            <input name="usuarioLogin" type="text" class="form-control" id="inputusuarioLogin" aria-describedby="inputusuarioLogin" placeholder="Usuari"  >
        </div>
        <div class="form-group">
            <label for="inputContraseñaLogin">Contrasenya:</label>
            <input name="contraseñaLogin" type="text" class="form-control" id="inputContraseñaLogin" aria-describedby="inputContraseñaLogin" placeholder="Contrasenya"  >
        </div>
        <div class="form-group">
            <label for="forgot">He oblidat la contrasenya:</label>
            <input name="forgot" type="checkbox" id="forgot">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <form class="d-flex" action="registre.php">
        <button class="btn btn-outline-dark" type="submit">
            <i class="bi bi-person"></i>
            Registrarse
        </button>
    </form>
</div>
