<?php

define('ROOT', dirname(__DIR__));

/*
require ROOT . '/app/App.php';
require ROOT . '/core/helpers/functions.php';
*/

require ROOT . '/vendor/autoload.php';


App::load();

$app = App::getInstance();
/*
var_dumpp($app->getTable('Article'));
var_dumpp($app->getTable('Categorie'));*/

/*$posts = $app->getTable('Article');
$posts->all();*/

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}


ob_start();
if ($page === 'home') {
    require ROOT . '/pages/articles/home.php';
} elseif ($page === 'articles.category') {
    require ROOT . '/pages/articles/category.php';
} elseif ($page === 'articles.show') {
    require ROOT . '/pages/articles/show.php';
}
$content = ob_get_clean();


require ROOT . '/pages/templates/default.php';
