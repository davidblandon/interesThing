<?php

/**
 * Created by: Juan Martín Espitia
 */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['email'] - string - contains the user's email
     * $this->attributes['password'] - string - contains the user's password account
     * $this->attributes['phone'] - string - contains the user's phone
     * $this->attributes['admin] - boolean - contains a boolean that represents if a user is admin or not
     * $this->attributes['idBank'] - string - contains the user's Bank id, for payments
     * $this->attributes['created_at'] - timestamps - contains the user's account creation day
     * $this->attributes['updated_at'] - timestamps - contains the user's account last update day
     * $this->orders - Order[] - contains the associated orders
     * $this->products - Product[] - contains the associated created products
     * $this->auctions - Auction[] - contains the associated maked auctions
     */
    protected $fillable = [

        'name',
        'email',
        'password',
        'phone',
        'admin',
        'idBank',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The database relations
     */
    public function orders(): HasMany

    {

        return $this->hasMany(Order::class);

    }

    public function products(): HasMany

    {

        return $this->hasMany(Product::class);

    }

    public function auctions(): HasMany

    {

        return $this->hasMany(Auction::class);

    }

    /**
     * getters and setters
     */

    public function getId(): int

    {

        return $this->attributes['id'];

    }

    public function getEmail(): string

    {

        return $this->attributes['email'];

    }

    public function setEmail(string $email): void

    {

        $this->attributes['email'] = $email;

    }

    public function setPassword(int $password): void

    {

        $this->attributes['password'] = $password;

    }

    public function getPhone(): string

    {

        return $this->attributes['phone'];

    }

    public function setPhone(string $phone): void

    {

        $this->attributes['phone'] = $phone;

    }

    public function getAdmin(): bool

    {

        return $this->attributes['admin'];

    }

    public function setAdmin(bool $admin): void

    {

        $this->attributes['admin'] = $admin;

    }

    public function getIdBank(): string

    {

        return $this->attributes['idBank'];

    }

    public function setIdBank(string $idBank): void

    {

        $this->attributes['idBank'] = $idBank;

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
