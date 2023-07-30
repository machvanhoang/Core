<?php

namespace App\View\Composers;

use Illuminate\View\View;

class AdminMenuComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $type = collect(config('type'));
        $view->with('type', $type);
    }
}
