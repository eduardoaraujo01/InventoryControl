<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\UnitOfMeasurement;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email'
    ];

    use HasFactory;


    public function user() {
        return $this->hasMany(User::class);
    }
    public function category() {
        return $this->hasMany(Category::class);
    }

    public function unitOfMeasurement() {
        return $this->hasMany(UnitOfMeasurement::class);
    }

    public function product() {
        return $this->hasMany(Product::class);
    }
}
