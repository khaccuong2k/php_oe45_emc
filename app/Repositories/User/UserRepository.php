<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function updateProfile($id, $request)
    {
        $foundUser = User::findOrFail($id);
        $userDataUpdate = $request->all();
        if ($foundUser) {
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $destinationPath = 'images/users/';
                $avatarName = $request->avatar->getClientOriginalName();
                $avatar->move($destinationPath, $avatarName);
                $userDataUpdate['avatar'] = $destinationPath.$avatarName;
            } else {
                $userDataUpdate['avatar'] = $foundUser->avatar;
            }
             $updatedUser = $foundUser->update($userDataUpdate);
            if ($updatedUser) {
                return true;
            }

             return false;
        }

        return false;
    }

    public function updatePassword($id, $request)
    {
        $foundUser = User::findOrFail($id);
        $userPassword = $foundUser->password;
        $currentPassword = $request->current_password;
        $newPassword = Hash::make($request->new_password);
        if (Hash::check($currentPassword, $userPassword)) {
            $changePassword = $foundUser->update([
                'password' => $newPassword
            ]);
            if ($changePassword) {
                return true;
            }

            return false;
        }
        
        return false;
    }
}
