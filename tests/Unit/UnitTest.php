<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UnitTest extends TestCase
{
    use RefreshDatabase;
    public function test_attribute_user()
    {
        $hashPassword = Hash::make('password');
        $user = User::make([
            'username' => 'naya',
            'email' => 'naya@gmail.com',
            'password' => $hashPassword,
        ]);

        $this->assertTrue($user->email == 'naya@gmail.com');
        $this->assertTrue($user->username == 'naya');
        $this->assertTrue($user->password == $hashPassword);
    }
    public function test_show_register_page()
    {
        $test = $this->get('/register')->assertStatus(200);
    }
    public function test_show_login_page()
    {
        $test = $this->get('/login')->assertStatus(200);
    }
}
