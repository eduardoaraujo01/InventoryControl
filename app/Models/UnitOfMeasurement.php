<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitOfMeasurement extends Model
{
    protected $fillable = [
        'name',
    ];
    use HasFactory;

    public function user() {
        return $this->hasMany(User::class);
    }
    public function provider() {
        return $this->hasMany(Provider::class);
    }

    public function category() {
        return $this->hasMany(Category::class);
    }

    public function product() {
        return $this->hasMany(Product::class);
    }
}
