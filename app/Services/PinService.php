<?php

namespace App\Services;
use App\Data\Pins\StorePinDTOData;
use App\Models\Pin;
use Illuminate\Http\UploadedFile;

class PinService
{
    public function new(StorePinDTOData $dto, UploadedFile $file): object
    {
        $path = $file->store('pins', 'public');

        $dto->image_url = $path;

        return Pin::create($dto->toArray());
    }
}
