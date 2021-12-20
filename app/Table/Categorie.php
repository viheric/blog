<?php

namespace App\Table;

use App\App;

class Categorie extends Table
{

    protected static $table = 'categories';

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getURL()
    {
        return '?p=categorie&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 50) . '...</p>';
        $html .= '<p><a href="' . $this->url . '">Voir la suite</a></p>';
        return $html;
    }
}
