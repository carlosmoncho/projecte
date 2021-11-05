<div>
    <h2>Resultat formulari</h2>
    Nom: <?=$product->name?><br>
    Preu Original: <?=$product->original_price?><br>
    Preu Descompte: <?=$product->discount_price?><br>
    Valoracio: <?=$product->stars?><br>
    Categoria: <?=$categories[$product->category-1]->name?><br>
    Foto: <img src="/img/<?= $product->img ?>"/>
</div>