<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Family;
use App\Models\Species;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = [];


    public function families() {
        return $this->hasMany(Family::class);
    }


    public function species() {
        return $this->hasMany(Species::class);
    }
}
