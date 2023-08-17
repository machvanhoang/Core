<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Tag::class;
    }
    public function getByType(string $table, string $type)
    {
        $result = $this->model->where([
            'table' => $table,
            'type' => $type,
        ])->get();
        return $result;
    }
}
