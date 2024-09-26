<?php

namespace App\Livewire\Users;

use App\Services\UserService;
use Livewire\Component;

class Profile extends Component
{
    protected UserService $userService;

    public $user;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function mount(string $username)
    {
        $this->user = $this->userService->findByUsername($username);
    }

    public function render()
    {
        return view('livewire.users.profile');
    }
}
