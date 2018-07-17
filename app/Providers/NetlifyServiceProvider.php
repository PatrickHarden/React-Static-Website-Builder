<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class NetlifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register a guzzle client for Netlify.
     * DOCS: http://docs.guzzlephp.org/en/stable/
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Netlify/Client', function ($app) {
            return new Client([
                'base_uri' => 'https://api.netlify.com/api/v1/',
                'headers' => [
                    'Content-Type' => 'application/json',
                    'User-Agent' => config('services.netlify.agent'),
                    'Authorization' => 'Bearer ' . config('services.netlify.token')
                ]
            ]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Netlify/Client'];
    }
}
