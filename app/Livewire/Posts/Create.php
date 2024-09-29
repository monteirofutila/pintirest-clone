<?php

namespace App\Livewire\Posts;

use App\Data\Pins\StorePinDTOData;
use App\Services\PinService;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected PinService $pinService;

    public $user;

    public $user_id;

    #[Validate('required')]
    public $title;

    #[Validate('nullable|max:255')]
    public $description;

    #[Validate('nullable|url')]
    public $link;

    #[Validate('required|image|mimes:jpg,jpeg,png|max:2048')]
    public $file;

    public function mount()
    {
        $this->user = auth()->user();
        $this->user_id = $this->user->id;
    }

    public function boot(PinService $pinService)
    {
        $this->pinService = $pinService;
    }

    public function store()
    {
        $this->validate();

        $dto = StorePinDTOData::from($this->except('file'));

        $this->pinService->new($dto, $this->file);

        $this->reset()->except('user');

        $this->redirectRoute('profile', $this->user->username);
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
