<?php

/**
 * Created by: David Blandón Román
 */

namespace App\Models;
use App\Models\Auction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the offer primary key (id)
     * $this->attributes['price'] - int - contains price of the offer
     * $this->attributes['auction'] - Auction - contains the auction is being offered
     * $this->attributes['user'] - User - contains the user who is making the offer
     */
    protected $fillable = ['price', 'userId', 'auctionId'];

    public static function validate(Request $request): void
    {
        $request->validate([

            'price' => 'required',

        ]);
    }

    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class, "auctionId");
    }

    public function getAuction(): Auction
    {
        return $this->auction;
    }

    public function setAuction(Auction $auction): void
    {
        $this->auction = $auction;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "userId");
    }

    public function getUser(): User
    {
        return $this->user;
    }
    
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];

    }

    public function setPrice(int $price): int
    {
        $this->attributes['price'] = $price;
    }
}