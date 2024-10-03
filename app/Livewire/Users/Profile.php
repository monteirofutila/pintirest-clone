<?php

namespace App\Livewire\Users;

use App\Services\PinService;
use App\Services\UserService;
use Livewire\Component;

class Profile extends Component
{
    protected UserService $userService;

    protected PinService $pinService;

    public $user;

    public $pins;

    public function boot(UserService $userService, PinService $pinService)
    {
        $this->userService = $userService;
        $this->pinService = $pinService;
    }

    public function mount(string $username)
    {
        $this->user = $this->userService->findByUsername($username);

        $this->pins = $this->pinService->getByUser($this->user);
    }

    public function render()
    {
        return view('livewire.users.profile');
    }
}
