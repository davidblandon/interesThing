<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateOrder(): void
    {

        $user = User::factory()->create();
        Auth::login($user);
        $products = Product::factory()->count(3)->create(['auctioned' => false]);
        $request = new Request();

        $sessionData = [
            'cart_product_data' => [
                $products[0]->id => 1,
                $products[1]->id => 2,
                $products[2]->id => 3,
            ],
        ];

        $response = $this->withSession($sessionData)->post('/order/create');

        $this->assertCount(1, Order::all());
        $order = Order::first();

        $this->assertEquals($user->id, $order->userId);
        $this->assertEquals(300, $order->total);
        $this->assertEquals(200, $user->fresh()->balance);
        $this->assertNull(session('cart_product_data'));
    }
}
