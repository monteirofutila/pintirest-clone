<?php

namespace App\Data\Users;

use Spatie\LaravelData\Data;

class UpdateUserDTOData extends Data
{
  public function __construct(
    public string $name,
    public string $username,
    public ?string $nickname,
    public ?string $bio,
    public ?string $website,
  ) {
  }
}
