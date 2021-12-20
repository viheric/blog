<?php

namespace App\Table;

use App\App;

class Article extends Table
{


    protected static $table = 'articles';


    public static function find($id)
    {
        return self::query("
            SELECT a.*, c.id, c.titre categorie
            FROM articles a
            LEFT JOIN categories c ON a.category_id=c.id
            WHERE a.id=?
    ", [$id], true);
    }

    public static function getLast()
    {
        return self::query("
            SELECT a.*, c.id, c.titre categorie
            FROM articles a
            LEFT JOIN categories c ON a.category_id=c.id
        ");
    }

    public static function lastByCategorie($id)
    {
        return self::query("
            SELECT a.*, c.id, c.titre categorie
            FROM articles a
            LEFT JOIN categories c ON a.category_id=c.id
            WHERE c.id = ?
        ", [$id]);
    }

    public function getURL()
    {
        return '?p=article&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 50) . '...</p>';
        $html .= '<p><a href="' . $this->url . '">Voir la suite</a></p>';
        return $html;
    }
}
