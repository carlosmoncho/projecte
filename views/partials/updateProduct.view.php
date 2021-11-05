<div style="background: aliceblue; margin: 50px" class="w-50 p-3">
    <?php
    if (!empty($errors)){
        foreach ($errors as $error):?>
            <p><?=$error?></p>
        <?php endforeach;?>
    <?php }?>
    <form method="POST" action="updateProduct.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputnom">Nom:</label>
            <input name="nom" type="text" class="form-control" id="inputnom" aria-describedby="inputnom" placeholder="Nom" value="<?= $product->name ?>"  >
        </div>
        <div class="form-group">
            <label for="inputPreuOriginal">Preu Original:</label>
            <input name="preuOriginal" type="text" class="form-control" id="inputPreuOriginal" aria-describedby="inputPreuOriginal" placeholder="Preu Original" value="<?=$product->original_price?>" >
        </div>
        <div class="form-group">
            <label for="inputPreuDescompte">Preu Descompte:</label>
            <input name="preuDescompte" type="text" class="form-control" id="inputPreuDescompte" aria-describedby="inputPreuDescompte" placeholder="Preu Descompte" value="<?=$product->discount_price?>">
        </div>
        <div class="form-group">
            <label for="inputStars">Valoracio:</label>
            <input name="stars" type="text" class="form-control" id="inputStars" aria-describedby="inputStars" placeholder="Estrelles" value="<?=$product->stars?>" >
        </div>
        <div class="form-group">
            <label for="innputSale">Sale: </label>
            <select id="innputSale" class="form-control" name="sale">
                <?php if ($product->sale == 1){?>
                    <option value="1">True</option>
                    <option value="0">False</option>
                <?php }else{?>
                    <option value="0">False</option>
                    <option value="1">True</option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="innputCategories">Categories: </label>
            <select id="innputCategories" class="form-control" name="categories">
                <option value="<?=$product->category?>"><?=$categories[$product->category-1]->name?></option>
                <?php foreach ($categories as $categoria){?>
                    <option value="<?=$categoria->id?>"><?=$categoria->name?></option>
                <?php }?>
            </select>
        </div>
        <br>
        <div class="custom-file">
            <input type="file" name="foto" id="foto" value="<?= $product->img ?>">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="id" value="<?= $product->id?>">Submit</button>
    </form>
</div>
