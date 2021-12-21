<?php

namespace App\Entity;

use App\App;
use Core\Entity\Entity;

class CategorieEntity extends Entity
{
    public function getURL()
    {
        return '?p=articles.category&id=' . $this->id;
    }

}
