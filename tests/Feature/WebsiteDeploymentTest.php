<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebsiteDeploymentTest extends TestCase
{
    /**
     * @test
     * @group deploy
     */
    public function it_can_deploy()
    {
        $this->withoutExceptionHandling();
        $user = User::all()->first();
        auth()->login($user);
        $response = $this->get(url()->route('websites:deploy', $user->website()->id));

        $response->assertStatus(302);
    }
}
