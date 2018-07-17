<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebsiteTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     * @group website
     */
    public function it_can_create()
    {
        $this->withoutExceptionHandling();
        $user = User::all()->first();
        auth()->login($user);

        $response = $this->post(url()->route('websites:create'));

        $response->assertStatus(200);
    }
}
