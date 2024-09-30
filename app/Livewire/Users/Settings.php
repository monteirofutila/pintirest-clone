<?php

namespace App\Livewire\Users;

use App\Data\Users\UpdateUserDTOData;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    protected UserService $userService;

    public $user;

    public $name;

    public $nickname;

    public $username;

    public $bio;

    public $website;

    public $file;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->refresh();
    }

    public function edit(): void
    {
        $this->validate();

        $dto = UpdateUserDTOData::from($this->except('file'));

        $this->userService->update($dto, $this->user);
        $this->userService->updateAvatar($this->file, $this->user);

        $this->reset();

        $this->redirectRoute(name: 'settings', navigate: true);
    }

    public function refresh()
    {
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->nickname = $this->user->nickname;
        $this->email = $this->user->email;
        $this->bio = $this->user->bio;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'nickname' => 'nullable|min:4|max:50',
            'username' => [
                'required',
                'min:4',
                'max:50',
                Rule::unique(User::class)->ignore($this->user->id),
            ],
            'bio' => 'nullable|max:255',
            'website' => 'nullable|url',
            'file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function render()
    {
        return view('livewire.users.settings');
    }
}
