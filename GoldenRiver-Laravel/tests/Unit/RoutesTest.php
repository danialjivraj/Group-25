<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\UserController;



class RoutesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testUpdateUserRoute()
    {
        //tests whether the /logout succesfuly redirects
        $response = $this->get('/user.update');

        $response->assertStatus(404);
    }

    // public function testloginRoute()
    // {
    //     //tests whether the /logout succesfuly redirects
    //     $response = $this->get('/profile');

    //     $response->assertStatus(200);
    // }


}
