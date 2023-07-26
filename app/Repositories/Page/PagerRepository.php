<?php

namespace App\Repositories\Page;

use App\Models\Page;
use App\Repositories\BaseRepository;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Page::class;
    }
}
