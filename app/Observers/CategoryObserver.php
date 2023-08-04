<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Seo;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        Seo::create([
            'table' => $category->getTable(),
            'parent_id' => $category->id,
            'title' => $category->name,
            'keyword' => $category->name,
            'description' => $category->description,
            'url' => $category->slug,
            'type' => $category->type,
            'image' => $category->media_id,
            'fb_image' => $category->media_id,
            'tw_image' => $category->media_id,
            'pr_image' => $category->media_id,
            'ig_image' => $category->media_id,
            'lk_image' => $category->media_id,
        ]);
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}
