<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

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
 * $this->offers - offer[] - refers to the offers that have been made for the aucti
 */

    public $timestamps = true;

    protected $fillable = ['name', 'limitDate', 'basePrice'];



    public function validate(Request $request)

    {

    $request->validate([

        "name" => "required",

        "limitDate" => "required",

        "basePrice" => "required",
        
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

    public function setName(string $name) : void

    {

    $this->attributes['name'] = $name;

    }


    public function getLimitDate(): date

    {

    return $this->attributes['limitDate'];

    }

    public function setLimitDate(date $limitDate) : void

    {

    $this->attributes['limitDate'] = $limitDate;

    }


    public function getBasePrice(): int

    {

    return $this->attributes['basePrice'];

    }

    public function setBasePrice($basePrice) : void

    {

    $this->attributes['basePrice'] = $basePrice;
    
    } 

    public function getCreatedAt(): Carbon

    {

    return $this->attributes['created_at'];

    }

    public function setCreatedAt(Carbon $createdAt) : void

    {

     $this->attributes['created_at'] = $createdAt;
    
    } 

    public function getUpdatedAt(): Carbon

    {

    return $this->attributes['updated_at'];

    }

    public function setUpdatedAt(Carbon $updatedAt) : void

    {

     $this->attributes['updated_at'] = $updatedAt;
    
    } 

}