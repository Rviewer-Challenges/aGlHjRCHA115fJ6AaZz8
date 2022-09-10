<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test create user
     *
     * @return void
     */
    public function test_create_user()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();
    }
}
