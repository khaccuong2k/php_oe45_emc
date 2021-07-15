<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function updateProfile($id, object $request);
    public function updatePassword($id, object $request);
}
