<?php

namespace App\Services;
use App\Data\Users\StoreUserDTOData;
use App\Models\User;

class UserService
{
    public function new(StoreUserDTOData $dto): void
    {
        $user = User::create($dto->toArray());

        auth()->login($user);
    }
}
