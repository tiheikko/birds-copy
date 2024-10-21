<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Genus;
use App\Models\Species;

class Family extends Model
{
    use HasFactory;

    protected $table = 'families';
    protected $guarded = [];



    public function order() {
        return $this->belongsTo(Order::class);
    }


    public function genera() {
        return $this->hasMany(Genus::class);
    }

    public function species() {
        return $this->hasMany(Species::class);
    }
}
