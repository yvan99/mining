<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function mineral()
    {
        return $this->belongsTo(Mineral::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
