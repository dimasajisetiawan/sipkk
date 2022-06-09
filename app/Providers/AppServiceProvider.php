<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Blade::directive('rupiah', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
        Gate::define('admin',function(User $user){
            return $user->role_users=='admin';
        });

        Gate::define('bendahara', function(User $user){
            return $user->role_users=='bendahara';
        });
        Gate::define('pemantau', function(User $user){
            return $user->role_users=='pemantau';
        });
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
