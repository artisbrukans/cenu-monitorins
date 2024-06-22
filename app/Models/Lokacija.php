<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokacija extends Model
{
    use HasFactory;
    protected $table = 'lokacija';
    protected $primaryKey = 'Iela';
    public $incrementing = false; // Assuming 'Iela' is not auto-incremented

    protected $fillable = [
        'Iela',
        'Pilseta',
        'Valsts',
    ];
}
