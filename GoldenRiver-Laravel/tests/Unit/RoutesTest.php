<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginLogoutController;



class RoutesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testLogoutRoute()
    {
        //tests whether the /logout succesfuly redirects
        $response = $this->get('/logout');

        $response->assertStatus(302);
    }

    // public function testloginRoute()
    // {
    //     //tests whether the /logout succesfuly redirects
    //     $response = $this->get('/profile');

    //     $response->assertStatus(200);
    // }


}
