<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestController extends Controller
{

    protected $suggestRepo;

    public function __construct(SuggestRepositoryInterface $suggestRepo)
    {
        $this->suggestRepo = $suggestRepo;
    }

    public function index()
    {
        if (Auth::check()) {
            return view('client.suggests.form');
        }
        return redirect()->route('login')->with('error', 'message.must_login');
    }

    public function handleSuggest(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $status = config('showitem.suggest_status.zero');
            $content = $request->content;

            $suggest = $this->suggestRepo->create([
                'user_id' => $userId,
                'status' => $status,
                'content' => $content
            ]);

            if ($suggest) {
                return back()->with('success', 'message.success');
            }
            return back()->with('error', 'message.failed');
        }
    }
}
