<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use App\Models\User;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        $this->registerFirstAdmin();
    }

    private function registerFirstAdmin()
    {
        if (env('FIRST_ADMIN_EMAIL', '') === '') {
            return;
        }

        $adminUser = User::Where('email', env('FIRST_ADMIN_EMAIL'))->first();

        if ($adminUser !== null) {
            return;
        }

        User::createUser('admin', env('FIRST_ADMIN_EMAIL'), Str::random(64));
    }
}
