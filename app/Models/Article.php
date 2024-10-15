<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Species;

class Article extends Model
{
    use HasFactory;
    
    protected $table = 'articles';
    protected $guarded = [];

    public function species() {
        return $this->hasOne(Species::class, 'id', 'bird_id');
    }

}
