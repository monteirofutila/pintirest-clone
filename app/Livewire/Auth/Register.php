<?php

namespace App\Livewire\Auth;

use App\Data\Users\StoreUserDTOData;
use App\Services\UserService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    protected UserService $userService;

    #[Validate('required')]
    public $name;

    #[Validate('required|unique:users,username')]
    public $username;

    #[Validate('required|email|unique:users,email')]
    public $email;

    #[Validate('required')]
    public $password;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register()
    {
        $this->validate();

        $dto = StoreUserDTOData::from($this->all());

        $user = $this->userService->new($dto);

        auth()->login($user);

        session()->regenerate();

        $this->reset();
        $this->redirectRoute('profile');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('components.layouts.guest');
    }
}
