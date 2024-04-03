<?php

/**
 * Created by: David Blandon
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Http\Request;


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
        'seller'

    ];

    /**
     * The database validation
     */
    public static function validate(Request $request)
    {

        $request->validate([

            'name' => 'required',

            'description' => 'required',

            'price' => 'required',

            'category' => 'required',

            'photo' => 'required',

        ]);
    }

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

    public function auction(): hasOne
    {

        return $this->hasOne(Auct::class);

    }

    /**
     * getters and setters
     */
    public function getId(): int
    {

        return $this->attributes['id'];

    }

    public function getName(): string
    {

        return $this->attributes['name'];

    }

    public function setName(string $name): void
    {

        $this->attributes['name'] = $name;

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

    public function setCreatedAt($createdAt): void
    {

        $this->attributes['created_at'] = $createdAt;

    }

    public function getUpdatedAt(): Carbon
    {

        return $this->attributes['updated_at'];

    }

    public function setUpdatedAt($updatedAt): void
    {

        $this->attributes['updated_at'] = $updatedAt;

    }

    public function setOrder(Order $orderId)
    {

        $this->attributes['order'] = $orderId;

    }
}
