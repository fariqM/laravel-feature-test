<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->type('username', 'fariq@gmail.com')
                    ->type('password', 'fariq123')
                    ->press('Sign In')
                    ->click('.dropdown')
                    ->AssertSeeLink('Logout');
        });
    }
}
