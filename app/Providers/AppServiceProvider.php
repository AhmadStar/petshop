<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * 
     *
     * @return void
     */
    public function register()
    {
        
    }
    /**
     * 
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
