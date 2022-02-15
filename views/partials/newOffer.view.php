<div style="background: aliceblue; margin: 50px" class="w-50 p-3">
    <?php
    if (!empty($errors)){
        foreach ($errors as $error):?>
            <p><?=$error?></p>
        <?php endforeach;?>
    <?php }?>
    <form method="POST" action="newOffer.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputproducte">Product id:</label>
            <input name="producte" type="text" class="form-control" id="inputproducte" aria-describedby="inputproducte"  value="<?= $product->id ?>">
        </div>
        <div class="form-group">
            <label for="inputPreu">Preu:</label>
            <input name="preu" type="text" class="form-control" id="inputPreu" aria-describedby="inputPreu" placeholder="Preu" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>