<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientKey extends Model
{
    protected $table = 'client_keys';

    public const VALUE_UNIQUE_CODE = 1;

    protected $fillable = [
        'name',
        'unique_code',
        'secret_key',
    ];
}
