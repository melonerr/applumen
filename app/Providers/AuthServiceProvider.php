<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Users;
use App\Models\Authorization;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            // if ($request->input('api_token')) {
            //     return User::where('api_token', $request->input('api_token'))->first();
            // }

            // $header = $request->header('Authorization');
            $token_key = $request->header('token_key');
            $user = $request->header('username');
            $pass = $request->header('password');

            if ($token_key && $user && $pass) {
                $result = Authorization::where([
                    ['token_key',  $token_key],
                    ['username',  $user],
                    ['password', $pass],
                    ['token_date','>', date("Y-m-d h:i:sa")],
                    ['status', 1]
                ])->first();
                // $data = count($result);

                if ($result) {
                    return new Users();
                }
            }
            return null;
        });
    }
}
