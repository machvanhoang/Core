<?php

namespace App\Traits;

use App\Repositories\Seo\SeoRepositoryInterface;

trait SeoTrait
{
    public function createSeo($model = null, array $dataSeo = [])
    {
        $dataSeo = [
            'table' => $model->getTable(),
            'parent_id' => $model->id,
            'title' => $dataSeo['seo_title'] ?? null,
            'keyword' => $dataSeo['seo_keyword'] ?? null,
            'description' => $dataSeo['seo_description'] ?? null,
            'url' => $model->slug,
            'type' => $model->type,
            'image' => $model->media_id ?? null,
            'fb_image' => $model->media_id ?? null,
            'tw_image' => $model->media_id ?? null,
            'pr_image' => $model->media_id ?? null,
            'ig_image' => $model->media_id ?? null,
            'lk_image' => $model->media_id ?? null,
        ];
        app(SeoRepositoryInterface::class)->updateOrCreate([
            'table' => $model->getTable(),
            'parent_id' => $model->id,
            'type'  => $model->type
        ], $dataSeo);
    }
    public function deleteSeo($model = null)
    {
        app(SeoRepositoryInterface::class)->findOneBy([
            'table' => $model->getTable(),
            'parent_id' => $model->id,
            'type'  => $model->type
        ])->delete();
    }
}
