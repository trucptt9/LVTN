<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AdminComposer
{
    /**
     * The system repository implementation.
     *
     */

    /**
     * Create a new profile composer.
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * 
     * @param View $view
     */
    public function compose(View $view)
    {

        $data = [];
        $view->with('data_menu_admin', $data);
    }
}
