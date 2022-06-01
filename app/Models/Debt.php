<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $table = 'debts';

    protected $fillable = [
        'name',
        'price'
    ];

}
