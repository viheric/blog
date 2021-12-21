<?php

namespace App\Entity;

use App\App;
use Core\Entity\Entity;

class ArticleEntity extends Entity
{


    public function getURL()
    {
        return '?p=articles.show&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 50) . '...</p>';
        $html .= '<p><a href="' . $this->url . '">Voir la suite</a></p>';
        return $html;
    }
}
