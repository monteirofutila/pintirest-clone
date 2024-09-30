<?php

namespace App\Livewire;

use App\Services\PinService;
use Livewire\Component;

class Home extends Component
{
    protected PinService $pinService;
    public $pins;

    public function boot(PinService $pinService)
    {
        $this->pinService = $pinService;
    }

    public function mount()
    {
        $this->pins = $this->pinService->findAll();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
