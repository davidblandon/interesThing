<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Models;
use Carbon\Carbon;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Database\Eloquent\Collection; 

class Auction extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['limitDate'] - date - contains the limit of the auction
     * $this->attributes['basePrice'] - int - contains the base price of the auction
     * $this->attributes['active'] - bool - checks if the auction is active
     * $this->attributes['product'] - Product - contains the product associeted to the auction
     * $this->offers - Offer[] - contains the associated offers
     */
    protected $fillable = ['limitDate', 'basePrice', 'productId'];

    public static function validate(Request $request): void
    {
        $request->validate([

            'limitDate' => 'required',

            'basePrice' => 'required',

        ]);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "productId");
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class, "auctionId");
    }

    public function getOffers(): Collection
    {
        return $this->offers;
    }


    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getLimitDate(): Carbon
    {
        $carbonDate = Carbon::parse($this->attributes['limitDate']);
        return $carbonDate;

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
}
