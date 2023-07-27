<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Seo;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        Seo::create([
            'title' => $product->name,
            'keyword' => $product->name,
            'description' => $product->description,
            'url' => $product->slug,
            'type' => $product->type,
            'image' => $product->media_id,
            'fb_image' => $product->media_id,
            'tw_image' => $product->media_id,
            'pr_image' => $product->media_id,
            'ig_image' => $product->media_id,
            'lk_image' => $product->media_id,
        ]);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}