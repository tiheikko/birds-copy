<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CommentService;
use App\DTO\CommentDTO;

class CommentController extends Controller
{

    protected $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function store(Request $request) {

        $userID = intval($request->input('userID'));
        $articleID = intval($request->input('articleID'));
        $content = $request->input('content');

        $this->commentService->createComment($articleID, $userID, $content);

        return redirect()->back();
    }

    public function index() {}
}
