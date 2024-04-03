<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Auction extends Model
{
    /**
     * AUCTIONS ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the auction name
     * $this->attributes['limitDate'] - timestamps - contains the auction limit day
     * $this->attributes['basePrice'] - int - contains the auction base price or initial price
     * $this->attributes['created_at'] - timestamps - contains the auction creation day
     * $this->attributes['updated_at'] - timestamps - contains the auction last update day
     * $this->aucter - User - refers to the user that is asociated with the auction
     * $this->product - Product - refers to the product that is asociated with the auction
     * $this->offers - Offer[] - refers to the offers that have been made for the auction
     * $this->maxOffer - Offer - refers to the offer taht is currently wining. The maximum
     */
    public $timestamps = true;

    /**
     * The database validation
     */
    protected $fillable = ['name', 'limitDate', 'basePrice'];

    public function validate(Request $request)
    {
        $request->validate([

            'limitDate' => 'required',

            'product' => 'required',

        ]);
    }

    /**
     * The database relations
     */

    public function aucter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'aucter');

    }

    public function product(): BelongsTo
    {

        return $this->belongsTo(Product::class, 'aucter');

    }

    public function offers(): HasMany
    {

        return $this->hasMany(Offer::class);

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

    public function getLimitDate(): Carbon
    {

        return $this->attributes['limitDate'];

    }

    public function setLimitDate(Carbon $limitDate): void
    {

        $this->attributes['limitDate'] = $limitDate;

    }

    public function getBasePrice(): int
    {

        return $this->attributes['basePrice'];

    }

    public function setBasePrice(int $basePrice): void
    {

        $this->attributes['basePrice'] = $basePrice;

    }

    public function getCreatedAt(): Carbon
    {

        return $this->attributes['created_at'];

    }

    public function setCreatedAt(Carbon $createdAt): void
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

    public function maxOffer()
    {

        $offers = $this->offers;

        if ($offers->isEmpty()) {
            return null;
        }

        $sortedOffers = $offers->sortByDesc('price');

        $maxOffer = $sortedOffers->first();

        return $maxOffer;
    }
}
