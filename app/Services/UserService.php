<?php

namespace App\Services;
use App\Data\StoreUserDTOData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function new(StoreUserDTOData $dto): void
    {
        $user = User::create($dto->toArray());

        Auth::login($user);
    }
}
