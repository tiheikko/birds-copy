<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Species;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $guarded = [];

    public function species() {
        return $this->belongsTo(Species::class);
    }

    public static function randomPaginate($perPage = 10) {
        return static::inRandomOrder()->paginate($perPage);
    }
}