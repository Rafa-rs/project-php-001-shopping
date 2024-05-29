<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Categoria;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        //incluir uma chave de categorias para utilizar em todas as view
        $categoriasMenu= Categoria::all();
        view()->share('categoriasMenu',$categoriasMenu);
    }
}
