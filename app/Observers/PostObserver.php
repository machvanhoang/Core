<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\Seo;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        Seo::create([
            'title' => $post->name,
            'keyword' => $post->name,
            'description' => $post->description,
            'url' => $post->slug,
            'type' => $post->type,
            'image' => $post->media_id,
            'fb_image' => $post->media_id,
            'tw_image' => $post->media_id,
            'pr_image' => $post->media_id,
            'ig_image' => $post->media_id,
            'lk_image' => $post->media_id,
        ]);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}