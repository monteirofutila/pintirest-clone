<?php

namespace App\Services;
use App\Models\User;

class BookMarkService
{
    public function getByUser(User $user): ?object
    {
        return $user->bookmarks()->with('pin')->orderBy('created_at', 'desc')->get();
    }
}
