<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['total'] - int - contains the order total price
     * $this->attributes['created_at'] - timestamps - contains the order creation day
     * $this->attributes['updated_at'] - timestamps - contains the order last update day
     * $this->user - User - refers to the user that is asociated with the order
     * $this->products - Product[] - refers to the products that are in the order
     */
    protected $fillable = [

        'total',
    ];

    /**
     * The database relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * getters and setters
     */
    public function getId(): int

    {
        return $this->attributes['id'];

    }

    public function getTotal(): string

    {
        return $this->attributes['total'];

    }

    public function setTotal(int $total): void

    {
        $this->attributes['total'] = $total;

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
