<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Seo;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $product->slug = Str::slug($product->name);
        $product->save();
        Seo::create([
            'title' => $product->name,
            'keyword' => $product->name,
            'description' => $product->description ?? NULL,
            'url' => $product->slug,
            'type' => $product->type,
            'image' => $product->media_id ?? NULL,
            'fb_image' => $product->media_id ?? NULL,
            'tw_image' => $product->media_id ?? NULL,
            'pr_image' => $product->media_id ?? NULL,
            'ig_image' => $product->media_id ?? NULL,
            'lk_image' => $product->media_id ?? NULL,
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
