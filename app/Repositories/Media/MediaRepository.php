<?php

namespace App\Repositories\Media;

use App\Models\Media;
use App\Repositories\BaseRepository;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Media::class;
    }

    public function getAllMediaByListId(array $listId = [])
    {
        return $this->model->whereIn('id', $listId)->get();
    }
}
