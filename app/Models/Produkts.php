<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkts extends Model
{
    use HasFactory;
    protected $table = 'produkts';
    protected $primaryKey = 'Svitrkods';

    protected $fillable = [
        'Svitrkods',
        'Nosaukums',
        'Daudzums',
        'Mervieniba',
    ];
}
