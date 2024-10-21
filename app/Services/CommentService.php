<?php

namespace App\Services;

use App\DTO\CommentDTO;

use App\Repositories\CommentRepository;

class CommentService
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

    public function createComment(int $userID, int $articleID, string $content): void {
        $commentDTO = new CommentDTO($userID, $articleID, $content);

        $this->commentRepository->create($commentDTO);
    }

    public function getCommentsByArticleID(int $articleID) {
        $comments = $this->commentRepository->getByArticleID($articleID);

        return $comments;
    }
}
