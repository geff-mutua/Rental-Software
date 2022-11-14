<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\SystemConfigComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $share=[
            'layouts.contentLayoutMaster',
            'layouts.fullLayoutMaster',
            'layouts.verticalLayoutMaster',
            'panels.sidebar', 
            'content.admin.invoices.view',
            'content.admin.invoices.print',
            'errors.419'
        ];

       
        View::composer($share, SystemConfigComposer::class);
    }
}
