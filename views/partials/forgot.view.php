<?php if (!empty($userValidator)){?>
    <form method="POST" action="forgot.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputuser">usuari:</label>
            <input name="user" type="text" class="form-control" readonly id="inputuser" aria-describedby="inputuser" value="<?=$userValidator->email?>">
        </div>
        <div class="form-group">
            <label for="inputpassword1">contrasenya nova:</label>
            <input name="password1" type="text" class="form-control" id="inputpassword1" aria-describedby="inputpassword1" placeholder="Password"  >
        </div>
        <div class="form-group">
            <label for="inputpassword2">Repeteix contrasenya:</label>
            <input name="password2" type="text" class="form-control" id="inputpassword2" aria-describedby="inputpassword2" placeholder="Paswword"  >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<?php }else{?>
    <h1>El usuario no existe</h1>
<?php }?>