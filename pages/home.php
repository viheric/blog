<?php

use App\App;
?>
<div class="container">
    <div class="row align-items-start">
        <div class="col-8">


            <?php foreach (\App\Table\Article::getLast() as $post) : ?>

                <h1><a href='<?= $post->url ?>'><?= $post->titre ?></a></h1>
                <p><em><?= $post->categorie ?></em></p>
                <?= $post->extrait ?>

            <?php endforeach; ?>


        </div>

        <div class="col-4">
            <ul>
                <?php foreach (\App\Table\Categorie::all() as $cat) : ?>
                    <li>
                        <a href='<?= $cat->url ?>'><?= $cat->titre ?></a>
                    </li>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>