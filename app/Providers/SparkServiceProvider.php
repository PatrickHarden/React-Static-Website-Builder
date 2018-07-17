<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Attorney Web Builder',
        'product' => 'AWB Website',
        'street' => '3104 S. Elm Place, Suite C',
        'location' => 'Broken Arrow, OK 74012',
        'phone' => '918-409-2101',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'chris@expect3.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = false;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront()->teamTrialDays(10);
        
        Spark::collectBillingAddress();

        Spark::plan('Basic', 'provider-id-1')
            ->price(49.99)
            ->trialDays(10)
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Advanced', 'provider-id-2')
            ->price(99.99)
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Pro', 'provider-id-3')
            ->price(149.99)
            ->features([
                'First', 'Second', 'Third'
            ]);
    }
}
