<?php

namespace App\Data\Pins;

use Spatie\LaravelData\Data;

class StorePinDTOData extends Data
{
  public function __construct(
    public string $user_id,
    public string $title,
    public ?string $description = null,
    public ?string $link = null,
    public ?string $image_path = null,
  ) {
  }
}
