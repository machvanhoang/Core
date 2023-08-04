<?php

namespace App\ViewComposers;

use Illuminate\View\View;

class AdminTypeComposer
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
        $type = request()->get('type') ?? null;
        $view->with(['type' => $type]);
    }
}
