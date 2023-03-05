<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mineral extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mine_tag',
        'quantity',
        'picture',
        'content',
        'source',
        'weight',
        'exported_value',
    ];
}
?>