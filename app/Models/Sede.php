<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
   public function reservas()
{
    return $this->hasMany(\App\Models\Reserva::class);
}
}
