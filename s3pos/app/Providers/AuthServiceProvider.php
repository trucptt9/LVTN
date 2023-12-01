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
                    Gate::define($gate, function (Staff $staff ) use ($module,$action ){
                        $sql = "select permissions.actions from permissions where staff_id = $staff->id and permissions.module = '$module->code'";
                        $actions = \DB::select($sql);
                        $new = $actions ? json_decode($actions[0] ->actions) :  [] ;
                        return $staff->is_supper == 'true' || in_array($action->code, $new);
            
                    });
                }
            }
        }
      
      
    }
}