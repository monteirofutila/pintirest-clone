<?php

namespace App\Services;
use App\Data\Users\StoreUserDTOData;
use App\Data\Users\UpdateUserDTOData;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Storage;

class UserService
{
    public function new(StoreUserDTOData $dto): object
    {
        return User::create($dto->toArray());
    }

    public function findByUsername(string $username): ?object
    {
        return User::where('username', $username)->firstOrFail();
    }

    public function update(UpdateUserDTOData $dto, User $user): object
    {
        $user->update($dto->toArray());

        return $user;
    }

    public function updateAvatar(UploadedFile $file, User $user): object
    {
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $path = $file->storeAs(
            'avatars',
            hash('sha256', random_int(0, PHP_INT_MAX) . '@' . $user->id) . '.png',
            'public'
        );

        $user->update([
            'avatar' => $path
        ]);

        return $user;
    }
}
