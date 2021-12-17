<?php foreach ($db->query("SELECT * FROM articles", "\App\Table\Article") as $post) : ?>

    <h1><a href='<?= $post->url ?>'><?= $post->titre ?></a></h1>
    <?= $post->extrait ?>

<?php endforeach; ?>

