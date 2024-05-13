<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class Product extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['photo'] - string - contains the route of the product photo
     * $this->attributes['category'] - string - contains the product category
     * $this->attributes['auctioned'] - bool - check if the product is auctioned
     * $this->buyer- User - contains the buyer of the product
     * $this->seller - User - contains the seller of the product
     * $this->order- Order - contains the buyer of the product
     */
    protected $fillable = ['name', 'price', 'description', 'category', 'photo', 'sellerId'];

    public static function validate(Request $request): void
    {
        $request->validate([

            'name' => 'required',

            'description' => 'required',

            'price' => 'required',

            'category' => 'required',

            'photo' => 'required',

        ]);
    }

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyerId');
    }

    public function getBuyer(): User
    {
        return $this->buyer;
    }

    public function setBuyerId(int $id): void
    {
        $this->attributes['buyerId'] = $id;
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sellerId');
    }

    public function getSeller(): User
    {
        return $this->seller;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'orderId');
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrderId(int $id): void
    {
        $this->attributes['orderId'] = $id;
    }

    public function auction(): HasOne
    {
        return $this->hasOne(Auction::class, 'auctionId');
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getPhoto(): string
    {
        return $this->attributes['photo'];
    }

    public function setPhoto($photo): void
    {
        $this->attributes['photo'] = $photo;
    }

    public function getCategory(): string
    {
        return $this->attributes['category'];
    }

    public function setCategory($category): void
    {
        $this->attributes['category'] = $category;
    }

    public function getAuctioned(): bool
    {
        return $this->attributes['auctioned'];
    }

    public function setAuctioned(bool $auctioned): void
    {
        $this->attributes['auctioned'] = $auctioned;
    }
}
