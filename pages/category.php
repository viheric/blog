<?php

use App\App;
use App\Table\Categorie;
use App\Table\Article;

$categorie = Categorie::find($_GET['id']);

if($categorie === false) {
    App::notFound();
}

$articles = Article::lastByCategorie($_GET['id']);
$categories = Categorie::all();
?>
<div class="row align-items-start">
    <div class="col-8">

    <h1><?= $categorie->titre ?></h1>

        <?php foreach ($articles as $post) : ?>

            <h2><a href='<?= $post->url ?>'><?= $post->titre ?></a></h2>
            <p><em><?= $post->categorie ?></em></p>
            <?= $post->extrait ?>

        <?php endforeach; ?>


    </div>

    <div class="col-4">
        <ul>
            <?php foreach ($categories as $cat) : ?>
                <li>
                    <a href='<?= $cat->url ?>'><?= $cat->titre ?></a>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>