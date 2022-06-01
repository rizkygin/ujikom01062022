<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable= ['month','user_id','debt_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function debt()
    {
        return $this->belongsTo(Debt::class);
    }
}
