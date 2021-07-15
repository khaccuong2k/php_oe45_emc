<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function show($id)
    {
        if (Auth::check() && Auth::id() == $id) {
            $currentUser = $this->userRepo->findOrFail($id);

            return view('client.users.profile', compact('currentUser'));
        }
        return back()->with('error', 'message.not_authorize');
    }

    public function passwordForm($id)
    {
        if (Auth::check() && Auth::id() == $id) {
            $currentUser = $this->userRepo->findOrFail($id);

            return view('client.users.changePassword', compact('currentUser'));
        }
        return back()->with('error', 'message.not_authorize');
    }

    public function update(Request $request, $id)
    {
        $foundUser = $this->userRepo->findOrFail($id);

        if ($foundUser && Auth::id() == $id) {
            $userUpdated = $this->userRepo->updateProfile($id, $request);
            if ($userUpdated) {
                return back()->with('success', 'message.update_success');
            }

            return back()->with('error', 'message.update_fail');
        }

        return back()->with('error', 'message.update_fail');
    }

    public function changePassword(Request $request, $id)
    {
        $foundUser = $this->userRepo->findOrFail($id);
        if ($foundUser && Auth::id() == $id) {
            $userUpdated = $this->userRepo->updatePassword($id, $request);
            if ($userUpdated) {
                return back()->with('success', 'message.update_success');
            }

            return back()->with('error', 'message.update_fail');
        }

        return back()->with('error', 'message.update_fail');
    }
}
