<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Car extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'cars';
    /**
     * @var string $table
     */
  //  protected $table = 'cars';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'id',
        'car',
        'model',
        'year'
    ];

    use HasFactory;
}
