<?php
require '../app/Autoloader.php';

App\Autoloader::register();


function var_dumpp($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}



$db = new App\Database('bblog');


if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}


ob_start();
if ($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'article') {
    require '../pages/single.php';
} elseif ($p === 'categorie') {
    require '../pages/category.php';
}
$content = ob_get_clean();


require '../pages/templates/default.php';
