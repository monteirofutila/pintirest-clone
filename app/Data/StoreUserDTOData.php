<?php

namespace App\Data;

use Spatie\LaravelData\Data;

readonly class StoreUserDTOData extends Data
{
  public function __construct(
    public string $name,
    public string $username,
    public string $email,
    public string $password,
  ) {
  }
}
