<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    /** @use HasFactory<\Database\Factories\Client\ClientFactory> */
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'phone',
    ];
}
