<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreCommentRequest;
use Illuminate\Http\Request;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $commentRepo;
    protected $productRepo;

    public function __construct(CommentRepositoryInterface $commentRepo, ProductRepositoryInterface $productRepo)
    {
        $this->commentRepo = $commentRepo;
        $this->productRepo = $productRepo;
    }

    public function postComment(StoreCommentRequest $request, $productId)
    {
        if (Auth::check()) {
            if (isset($request->comment_parent_id)) {
                $commentParentId = $request->comment_parent_id;
            } else {
                $commentParentId = null;
            }
            $foundProduct = $this->productRepo->findOrFail($productId);
            if ($foundProduct) {
                $postComment = $this->commentRepo->create([
                    'product_id' => $productId,
                    'content' => $request->content,
                    'user_id' => Auth::id(),
                    'comment_parent_id' => $commentParentId,
                ]);
                if ($postComment) {
                    return back()->with('success', 'message.commented');
                }
            }
        }

        return back()->with('error', 'message.must_login');
    }
}
