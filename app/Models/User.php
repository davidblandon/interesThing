<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the User name
     * $this->attributes['email'] - string - contains the User email
     * $this->attributes['phone'] - string - contains the User phone
     * $this->attributes['balance'] - int - contains the User balance
     *  $this->orders - Order[] - contains the associated orders
     *  $this->offers - Offer[] - contains the associated offers
     *  $this->productsSelled - Product[] - contains the associated products that the user has selled or put in sell
     *  $this->productsBuyed - Product[] - contains the associated products that the user has buyed
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'balance',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'userId');
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): Collection
    {
        $this->orders = $orders;
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class, 'userId');
    }

    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function productsSelled(): HasMany
    {
        return $this->hasMany(Product::class, 'sellerId');
    }

    public function getProductsSelled(): Collection
    {
        return $this->productsSelled;
    }

    public function productsBuyed(): HasMany
    {
        return $this->hasMany(Product::class, 'buyerId');
    }

    public function getProductsBuyed(): Collection
    {
        return $this->productsBuyed;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getAdmin(): bool
    {
        return $this->attributes['admin'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $id;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPhone(): string
    {
        return $this->attributes['phone'];
    }

    public function setPhone(string $phone): void
    {
        $this->attributes['phone'] = $phone;
    }

    public function getBalance(): int
    {
        return $this->attributes['balance'];
    }

    public function setBalance(int $balance): void
    {
        $this->attributes['balance'] = $balance;
    }
}
