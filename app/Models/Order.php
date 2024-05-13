<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     *  $this->attributes['id'] - int - contains the product primary key (id)
     *  $this->attributes['total] - int - contains the order total cost
     *  $this->user - User - contains the associated user to the order
     *  $this->products - Product[] - contains the associated products
     */
    protected $fillable = ['total', 'userId'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'orderId');
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function setProducts(Collection $products): Collection
    {
        $this->products = $products;
    }
}
