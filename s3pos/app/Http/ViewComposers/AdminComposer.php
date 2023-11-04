<?php

namespace App\Http\ViewComposers;

use App\Models\AdminMenu;
use Illuminate\Support\Facades\Cache;
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
        $key = 'admin-menu';
        if (Cache::has($key)) {
            $menus = Cache::get($key);
        } else {
            $menus = Cache::rememberForever($key, function () {
                return AdminMenu::with('menus')->parentId(0)->orderBy('numering', 'asc')->get();
            });
        }
        $view->with('admin_menu', $menus);
    }
}
