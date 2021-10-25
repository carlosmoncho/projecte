<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Original price</th>
        <th scope="col">Discount price</th>
        <th scope="col">Stars</th>
        <th scope="col">Sale</th>
        <th scope="col">Botones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($productos as $producto){?>
        <tr>
            <th scope="row"><?=$producto->id?></th>
            <td><?=$producto->name?></td>
            <td><?=$producto->original_price?></td>
            <td><?=$producto->discount_price?></td>
            <td><?=$producto->stars?></td>
            <?php if ($producto->sale == 1){?>
                <td>True</td>
            <?php }else{?>
                <td>False</td>
            <?php }?>
            <td>
                <form method="POST" class="d-flex" action="/deleteProduct.php"" >
                <button class="btn btn-dark" type="submit" name="eliminar" value="<?= $producto->id?>">
                    eliminar
                </button>
                </form>
                <form method="POST" class="d-flex" action="/updateProduct.php"" >
                <button class="btn btn-dark" type="submit" name="update" value="<?= $producto->id?>">
                    update
                </button>
                </form>
                <form method="POST" class="d-flex" action="/showProducte.php"" >
                <button class="btn btn-dark" type="submit" name="show" value="<?= $producto->id?>">
                    Datos Producto
                </button>
                </form>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<form class="d-flex" action="/newProduct.php"" >
    <button class="btn btn-dark" type="submit" >
        Nuevo producto
    </button>
</form><br>
