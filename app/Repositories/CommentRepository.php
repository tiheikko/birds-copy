<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

use App\DTO\CommentDTO;
class CommentRepository
{
    public function create(CommentDTO $commentDTO) : void {
        DB::table('comments')->insert([
            'article_id' => $commentDTO->articleID,
            'user_id' => $commentDTO->userID,
            'comment' => $commentDTO->comment,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function getByArticleID(int $articleID)
    {
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name as user_name')
            ->where('article_id', $articleID)
            ->get();

        return $comments;
    }
}
