<?php

namespace App\DTO;

class CommentDTO
{
    public function __construct(
        public int $articleID,
        public int $userID,
        public string $comment,
    ){}
}
