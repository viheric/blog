<?php

namespace App\Table;

use App\App;
use Core\Table\Table;

class ArticleTable extends Table
{


    protected $table = 'articles';

    public function last()
    {
        return $this->query("
            SELECT a.*, c.id, c.titre categorie
            FROM articles a
            LEFT JOIN categories c ON a.category_id=c.id
            ORDER BY a.date DESC
        ");
    }


    public function find($id)
    {
        return $this->query("
            SELECT a.*, c.id, c.titre categorie
            FROM articles a
            LEFT JOIN categories c ON a.category_id=c.id
            WHERE a.id=?
    ", [$id], true);
    }

    public function getLast()
    {
        return $this->query("
            SELECT a.*, c.id, c.titre categorie
            FROM articles a
            LEFT JOIN categories c ON a.category_id=c.id
        ");
    }

    public function lastByCategorie($id)
    {
        return $this->query("
            SELECT a.*, c.id, c.titre categorie
            FROM articles a
            LEFT JOIN categories c ON a.category_id=c.id
            WHERE c.id = ?
        ", [$id]);
    }

}
