<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Species;

class Genus extends Model
{
    use HasFactory;

    protected $table = 'genera';
    protected $guarded = [];


    public function order() {
        return $this->belongsTo(Order::class);
    }


    public function family() {
        return $this->belongsTo(Family::class);
    }

    public function species() {
        return $this->hasMany(Species::class);
    }


}
