<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Staff;
use App\Models\Permission;
use App\Models\Module;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $all = Module::all();
        foreach($all as $module){
            if($module->actions){
                $actions = json_decode($module->actions);
                foreach($actions as $action){
                    $gate = $module->code.'-'.$action->code;
                    Gate::define($gate, function (Staff $staff) {
                        // if($staff->is_supper == 'true'){
                        //     return true;
                        // }
                    //    $sql = "select permissions.action from permissions where"
                   
                    // return $staff->id == use($module);
                    });
                }
            }
        }
      
      
    }
}