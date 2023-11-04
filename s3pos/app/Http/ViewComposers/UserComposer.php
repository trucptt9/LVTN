<?php

namespace App\Http\ViewComposers;

use App\Models\Menu;
use App\Models\Store;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class UserComposer
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
        if (auth()->check()) {
            $staff = auth()->user();
            $view->with('user_staff', $staff);

            $store = Store::find($staff->store_id);
            $view->with('user_store', $store);

            $key = 'user-menu';
            if (Cache::has($key)) {
                $menus = Cache::get($key);
            } else {
                $menus = Cache::rememberForever($key, function () {
                    return Menu::with('menus')->parentId(0)->orderBy('numering', 'asc')->get();
                });
            }
            $view->with('user_menu', $menus);
        }
    }
}
