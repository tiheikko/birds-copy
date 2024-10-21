<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Article;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $guarded = [];

    public function species() {
        return $this->belongsTo(Species::class);
    }

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
