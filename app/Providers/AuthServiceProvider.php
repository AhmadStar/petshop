<?php
namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * 
     *
     * @var array
     */
    protected $policies = [
        
    ];
    /**
     * 
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();   
    }
}
