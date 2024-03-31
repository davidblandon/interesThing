<?php

/**
 * Created by: David Blandon
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['description'] - string - contains the product's description
     * $this->attributes['price'] - int - contains the product's price
     * $this->attributes['photo'] - string - contains the product's photo route
     * $this->attributes['sold'] - boolean - contains a boolean that represents if a product is already sold or not
     * $this->attributes['category'] - string - contains the product's category, like: []
     * $this->attributes['auctioned'] - boolean - contains a boolean that represents if a product was auctioned or not
     * $this->attributes['created_at'] - timestamps - contains the product creation day
     * $this->attributes['updated_at'] - timestamps - contains the product last update day
     * $this->seller - User - refers to the user that created the product and is selling or sold it
     * $this->order - Order - refers to the order that is created when the product is sold. If it isn't sold yet, it will be NULL
     */
    protected $fillable = [

        'name',
        'description',
        'price',
        'photo',
        'sold',
        'category',
        'auctioned',

    ];

    /**
     * The database relations
     */
    public function seller(): BelongsTo
    {

        return $this->belongsTo(User::class, 'seller');

    }

    public function order(): BelongsTo
    {

        return $this->belongsTo(Order::class, 'order');

    }

    /**
     * getters and setters
     */
    public function getId(): int
    {

        return $this->attributes['id'];

    }

    public function getDescription(): string
    {

        return $this->attributes['description'];

    }

    public function setDescription(string $description): void
    {

        $this->attributes['description'] = $description;

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

    public function setPhoto(string $photo): void
    {

        $this->attributes['photo'] = $photo;

    }

    public function getSold(): bool
    {

        return $this->attributes['sold'];

    }

    public function setSold(bool $sold): void
    {

        $this->attributes['sold'] = $sold;

    }

    public function getCategory(): string
    {

        return $this->attributes['category'];

    }

    public function setCategory(string $category): void
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

    public function getCreatedAt(): Carbon
    {

        return $this->attributes['created_at'];

    }

    public function getUpdatedAt(): Carbon
    {

        return $this->attributes['updated_at'];

    }

    public function setUpdatedAt(Carbon $updatedAt): void
    {

        $this->attributes['updated_at'] = $updatedAt;

    }

    public function setOrder(Order $orderId)
    {

        $this->attributes['order'] = $orderId;

    }
}
