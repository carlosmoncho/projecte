<div style="background: aliceblue; margin: 50px" class="w-50 p-3">
    <?php
    if (!empty($errors)){
        foreach ($errors as $error):?>
            <p><?=$error?></p>
        <?php endforeach;?>
    <?php }?>
    <form method="POST" action="registre.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputnombreUsuario">Nom de usuari:</label>
            <input name="nombreUsuario" type="text" class="form-control" id="inputusnombreUsuario" aria-describedby="inputunombreUsuario" placeholder="Nom usuari"  >
        </div>
        <div class="form-group">
            <label for="inputGmail">Correu electronic:</label>
            <input name="email" type="email" class="form-control" id="inputGmail" aria-describedby="inputGmail" placeholder="Correu electronic"  >
        </div>
        <div class="form-group">
            <label for="inputContraseña1">Contrasenya:</label>
            <input name="contraseña1" type="text" class="form-control" id="inputContraseña1" aria-describedby="inputContraseña1" placeholder="Contrasenya"  >
        </div>
        <div class="form-group">
            <input name="contraseña2" type="text" class="form-control" id="inputContraseña2" aria-describedby="inputContraseña2" placeholder="Contraseña comprovació"  >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>