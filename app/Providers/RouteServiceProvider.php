<?php
namespace App\Providers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
class RouteServiceProvider extends ServiceProvider
{
    /**
     * 
     *
     * 
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    /**
     * 
     *
     * @var string
     */
    public const HOME = '/home';
    /**
     * 
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
    /**
     * 
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }
    /**
     * 
     *
     * 
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
    /**
     * 
     *
     * 
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
