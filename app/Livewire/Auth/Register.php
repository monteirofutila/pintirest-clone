<?php

namespace App\Livewire\Auth;

use App\Data\StoreUserDTOData;
use App\Services\UserService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required')]
    public $name;

    #[Validate('required|unique:users,username')]
    public $email;

    #[Validate('required|confirmed')]
    public $password;

    public $password_confirmation;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register()
    {
        dd($this->all());
        $this->validate();

        $dto = StoreUserDTOData::from($this->all());

        $this->userService->new($dto);

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
