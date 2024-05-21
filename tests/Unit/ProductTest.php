<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace Tests\Unit;

use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testSaveProduct()
    {
        Storage::fake('public');
        $request = new Request();
        $photo = UploadedFile::fake()->image('photo.jpg');

        $request->merge([
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'photo' => $photo,
            'price' => 100,
            'category' => 'Test Category',
        ]);

        $request->files->set('photo', $photo);
        $user = User::factory()->create();
        Auth::login($user);
        $controller = new ProductController();
        $response = $controller->save($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 100,
            'category' => 'Test Category',
            'sellerId' => $user->getId(),
        ]);

        Storage::disk('public')->assertExists('photos/'.$photo->hashName());
    }
}
