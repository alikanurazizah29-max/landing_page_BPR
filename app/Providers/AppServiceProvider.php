<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\CompanyProfile;

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
        // Membagikan data profil perusahaan secara global ke semua view dalam folder user.*
        View::composer(['user.*'], function ($view) {
            if (Schema::hasTable('company_profiles')) {
                $view->with('companyProfile', CompanyProfile::first());
            }
        });
    }
}