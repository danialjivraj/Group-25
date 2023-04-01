<?php

namespace Tests\Feature;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Database\Factories\ProductFactory;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasketControllerTest extends TestCase
{

    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testAddToBasket()
    {
        $this->assertTrue(true);
    }

}
