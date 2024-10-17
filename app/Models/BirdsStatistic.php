<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Species;
use App\Models\User;

class BirdsStatistic extends Model
{
    use HasFactory;

    protected $table = 'birds_statistics';
    protected $guarded = [];

    public function species()
    {
        return $this->hasOne(Species::class, 'id', 'bird_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
