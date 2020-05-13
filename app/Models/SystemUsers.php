<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemUsers extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
