<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FeatureTest extends TestCase
{
    public function test_redirect_to_home_after_register()
    {
        $test = $this->post('/register', [
            'username' => 'fariq123',
            'email' => 'fariq@gmail.com',
            'password' => 'fariq123',
        ]);
        $test->assertStatus(302);
        $test->assertRedirect('home');
    }

    public function test_show_register_page_only_for_guest()
    {
        $user = User::where('email', 'fariq@gmail.com')->first();
        $test = $this->actingAs($user)->get('/register');
        $test->assertStatus(302);
        $test->assertRedirect('home');
    }

    public function test_login_with_email()
    {
        $test = $this->post('/login', [
            'username' => 'fariq@gmail.com',
            'password' => 'fariq123'
        ]);
        $test->assertStatus(302);
    }

    public function test_login_with_username()
    {
        $test = $this->post('/login', [
            'username' => 'fariq123',
            'password' => 'fariq123'
        ]);
        $test->assertStatus(302);
    }

    public function test_show_message_if_failed_login()
    {
        $test = $this->post('/login', [
            'username' => 'fariq123',
            'password' => 'wrong_password'
        ]);
        $test->assertSessionHas('login_error');
    }

    public function test_redirect_after_login()
    {
        $test = $this->post('/login', [
            'username' => 'fariq@gmail.com',
            'password' => 'fariq123'
        ]);
        $test->assertRedirect('home');
    }

    public function test_show_login_page_only_for_guest()
    {
        $user = User::where('email', 'fariq@gmail.com')->first();
        $test = $this->actingAs($user)->get('/login');
        $test->assertStatus(302);
        $test->assertRedirect('home');
    }

    public function test_isi_profil_pengguna()
    {
        $user = User::where('email', 'fariq@gmail.com')->first();
        $test = $this->actingAs($user)->get('/home/edit-profile');
        // $test->dumpSession();
        $test
            ->assertStatus(200)
            ->assertViewHas('user', function (User $user) {
                return isset($user->email);
            })
            ->assertViewHas('user', function (User $user) {
                return isset($user->username);
            })
            ->assertViewHas('user', function (User $user) {
                return property_exists($user, 'tgl');
            });
            // ->assertViewHas('user', function (User $user) {
            //     return isset($user->tgl);
            // })
            // ->assertViewHas('user', function (User $user) {
            //     return isset($user->quotes);
            // });
    }
}
