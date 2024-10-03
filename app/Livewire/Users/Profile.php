<?php

namespace App\Livewire\Users;

use App\Services\BookMarkService;
use App\Services\PinService;
use App\Services\UserService;
use Livewire\Component;

class Profile extends Component
{
    protected UserService $userService;

    protected PinService $pinService;

    protected BookMarkService $bookMarkService;

    public $user;

    public $pins;

    public $bookmarks;

    public function boot(
        UserService $userService,
        PinService $pinService,
        BookMarkService $bookMarkService
    ) {
        $this->userService = $userService;
        $this->pinService = $pinService;
        $this->bookMarkService = $bookMarkService;
    }

    public function mount(string $username)
    {
        $this->user = $this->userService->findByUsername($username);

        $this->pins = $this->pinService->getByUser($this->user);

        $this->bookmarks = $this->bookMarkService->getByUser($this->user);
    }

    public function render()
    {
        return view('livewire.users.profile');
    }
}
