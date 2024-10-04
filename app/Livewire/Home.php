<?php

namespace App\Livewire;

use App\Models\Pin;
use App\Services\BookMarkService;
use App\Services\PinService;
use Livewire\Component;

class Home extends Component
{
    protected PinService $pinService;

    protected BookMarkService $bookMarkService;

    public $user;

    public $pins;

    public function boot(PinService $pinService, BookMarkService $bookMarkService)
    {
        $this->pinService = $pinService;
        $this->bookMarkService = $bookMarkService;
    }

    public function mount()
    {
        $this->pins = $this->pinService->findAll();
        $this->user = auth()->user();
    }

    public function bookmark($pin_id)
    {

        $bookmark = $this->bookMarkService->bookmark($pin_id, $this->user);

        !$bookmark ?
            $this->dispatch('flash.message', message: 'Erro ao guardar') :
            $this->dispatch('flash.message', message: 'Guardado no perfil');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
