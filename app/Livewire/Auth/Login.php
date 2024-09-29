<?php

namespace App\Livewire\Auth;

use App\Data\Auth\LoginDTOData;
use App\Services\AuthService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{

    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    public function boot(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function authenticate()
    {
        $this->validate();

        $dto = LoginDTOData::from($this->all());

        $login = $this->authService->login($dto);

        if (!$login) {
            return;
        }

        session()->regenerate();

        $this->reset();

        $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.guest');
    }
}
