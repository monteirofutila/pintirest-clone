<?php

namespace App\Data\Users;

use Spatie\LaravelData\Data;

class StoreUserDTOData extends Data
{
  public function __construct(
    public string $name,
    public string $username,
    public string $email,
    public string $password,
  ) {
  }
}
