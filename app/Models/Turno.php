<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{

    protected $guarded = [];
    use SoftDeletes;

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function vehicle_types(){
        return $this->belongsTo(VehicleType::class);
    }

    public function wash_types(){
        return $this->belongsTo(WashType::class);
    }

    public function marcas(){
        return $this->belongsTo(Marca::class);
    }

    public function model_types(){
        return $this->belongsTo(ModelType::class);
    }
}
