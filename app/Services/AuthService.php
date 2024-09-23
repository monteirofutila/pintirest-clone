<?php

namespace App\Services;
use App\Data\Auth\LoginDTOData;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function login(LoginDTOData $dto): bool
    {
        return auth()->attempt($dto->toArray());
    }
    public function me(): ?object
    {
        return auth()->user();
    }
    public function logout(): void
    {
        auth()->logout();
    }
}
