<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Image;
use App\Models\Article;

class Species extends Model
{
    use HasFactory;

    protected $table = 'species';
    protected $guarded = [];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function family() {
        return $this->belongsTo(Family::class);
    }

    public function genus() {
        return $this->belongsTo(Genus::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function articles() {
         return $this->belongsTo(Article::class, 'bird_id', 'id');
    }
}
