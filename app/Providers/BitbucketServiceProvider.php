<?php

namespace App\Providers;

use Bitbucket\API\Api;
use Bitbucket\API\Http\Listener\OAuthListener;
use Illuminate\Support\ServiceProvider;

class BitbucketServiceProvider extends ServiceProvider
{
    /**
     * Instantiate the bitbucket API
     * DOCS: https://gentlero.bitbucket.io/bitbucket-api/1.0/examples/authentication.html
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Bitbucket/Api', function () {
            $bitbucket = new Api();

            $bitbucket->getClient()->addListener(
                new OAuthListener(
                    [
                        'oauth_consumer_key'    => config("services.bitbucket.key"),
                        'oauth_consumer_secret' => config('services.bitbucket.secret')
                    ]
                )
            );

            return $bitbucket;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'Bitbucket/Api'
        ];
    }
}
