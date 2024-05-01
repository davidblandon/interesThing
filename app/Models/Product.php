<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Models;
use App\Models\User;
use App\Models\Order;
use App\Models\Auction;
use Illuminate\Database\Eloquent\Relations\HasOne; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

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
     * $this->attributes['buyer'] - User - contains the buyer of the product
     * $this->attributes['seller'] - User - contains the seller of the product
     * $this->attributes['order'] - Order - contains the buyer of the product
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
        return $this->belongsTo(User::class, "buyerId");
    }

    public function getBuyer(): User
    {
        return $this->buyer;
    }

    public function setBuyer(User $buyer): void
    {
        $this->buyer = $buyer;
    }
   
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, "sellerId");
    }
   
    public function getSeller(): User
    {
        return $this->seller;
    }

    public function setSeller(User $seller): void
    {
        $this->seller = $seller;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function auction(): HasOne
    {
        return $this->hasOne(Auction::class); 
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

    public function setPrice($price): void
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
