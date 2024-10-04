<?php

namespace App\Services;
use App\Models\Bookmark;
use App\Models\Pin;
use App\Models\User;

class BookMarkService
{
    public function getByUser(User $user): ?object
    {
        return $user->bookmarks()->with('pin')->orderBy('created_at', 'desc')->get();
    }

    public function bookmark($pin_id, User $user): ?object
    {
        return Bookmark::firstOrCreate([
            'user_id' => $user->id,
            'pin_id' => $pin_id
        ]);
    }

    public function unbookmark(Pin $pin, User $user): bool
    {
        $bookmark = $pin->bookmarks()->where('user_id', $user->id)->first();
        return $bookmark->delete();
    }
}
