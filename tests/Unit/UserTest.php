<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_connection()
    {
        $user1 = new User([
           'id' => 1,
           'name' => 'Elisha',
           'lastname' => 'Ngoma',
           'password' => '123',
           'is_dane' => 'true',
        ]);

        $user2 = new User([
            'id' => 2,
            'name' => 'Elisha',
            'lastname' => 'Ngoma',
            'password' => '123',
            'is_dane' => 'true',
         ]);

        

        $this->assertEquals('Elisha', $user1->name);
    }
}
