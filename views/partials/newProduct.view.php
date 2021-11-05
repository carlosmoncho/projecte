<div style="background: aliceblue; margin: 50px" class="w-50 p-3">
    <?php
    if (!empty($errors)){
        foreach ($errors as $error):?>
            <p><?=$error?></p>
        <?php endforeach;?>
    <?php }?>
    <form method="POST" action="newProduct.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputnom">Nom:</label>
            <input name="nom" type="text" class="form-control" id="inputnom" aria-describedby="inputnom" placeholder="Nom" >
        </div>
        <div class="form-group">
            <label for="inputPreuOriginal">Preu Original:</label>
            <input name="preuOriginal" type="text" class="form-control" id="inputPreuOriginal" aria-describedby="inputPreuOriginal" placeholder="Preu Original" >
        </div>
        <div class="form-group">
            <label for="inputPreuDescompte">Preu Descompte:</label>
            <input name="preuDescompte" type="text" class="form-control" id="inputPreuDescompte" aria-describedby="inputPreuDescompte" placeholder="Preu Descompte" >
        </div>
        <div class="form-group">
            <label for="inputStars">Valoracio:</label>
            <input name="stars" type="text" class="form-control" id="inputStars" aria-describedby="inputStars" placeholder="Estrelles" >
        </div>
        <div class="form-group">
            <label for="innputSale">Sale: </label>
            <select id="innputSale" class="form-control" name="sale">
                <option value="1">True</option>
                <option value="0">False</option>
            </select>
        </div>
        <div class="form-group">
            <label for="innputCategories">Categories: </label>
            <select id="innputCategories" class="form-control" name="categories">
                <?php foreach ($categories as $categoria){?>
                    <option value="<?=$categoria->id?>"><?=$categoria->name?></option>
                <?php }?>
            </select>
        </div>
        <br>
        <div class="custom-file">
            <input type="file" name="foto" id="foto">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
