<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceModel extends Model
{
    /** @use HasFactory<\Database\Factories\Service\ServiceFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'price',
    ];
}
