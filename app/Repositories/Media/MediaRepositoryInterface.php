<?php

namespace App\Repositories\Media;

use App\Repositories\RepositoryInterface;

interface MediaRepositoryInterface extends RepositoryInterface
{
    public function getAllMediaByListId(array $listId = []);
}
