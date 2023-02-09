<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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

    public function unitOfMeasuremente() {
        return $this->hasMany(UnitOfMeasuremente::class);
    }

    public function product() {
        return $this->hasMany(Product::class);
    }

}
