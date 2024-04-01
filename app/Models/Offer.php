<?php

/**
 * Created by: Laura Ortíz
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /**
     * OFFER ATTRIBUTES
     * $this->attributes['id'] - int - contains the offer primary key (id)
     * $this->attributes['price'] - int - contains the price that was offered
     * $this->attributes['created_at'] - timestamps - contains the offer creation day
     * $this->attributes['updated_at'] - timestamps - contains the offer last update day
     * $this->user - User - refers to the user that maked the offer
     * $this->auction - Auction - refers to the auction that is asociated with the offer
     */
    protected $fillable = [

        'price',
    ];


            /**
     * The database validation
     */

    public function validate(Request $request)
    {
 
        $request->validate([
 
            'price' => 'required',
 
        ]);
    }

    /**
     * The database relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class, 'auction');
    }

    /**
     * getters and setters
     */
    public function getId(): int
    {
        return $this->attributes['id'];

    }

    public function getPrice(): int
    {

        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {

        $this->attributes['price'] = $price;

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
}
