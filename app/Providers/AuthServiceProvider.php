<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Direktori' => 'App\Policies\DirektoriPolicy',
        'App\Models\Layanan' => 'App\Policies\LayananPolicy',
        'App\Models\Testimoni' => 'App\Policies\TestimoniPolicy',
        'App\Models\KotabaruLink' => 'App\Policies\KotabaruLinkPolicy',
        'App\Models\Siring' => 'App\Policies\SiringPolicy',
        'App\Models\Survey' => 'App\Policies\SurveyPolicy',
        'App\Models\Social' => 'App\Policies\SocialPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\Page' => 'App\Policies\PagePolicy',
        'App\Models\Banner' => 'App\Policies\BannerPolicy',
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
