<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veikals extends Model
{
    use HasFactory;
    protected $table = 'veikals';
    protected $primaryKey = 'Veikals_ID';

    protected $fillable = [
        'Vieta',
        'Nosaukums',
    ];

    public function lokacija()
    {
        return $this->belongsTo(Lokacija::class, 'Vieta', 'Iela');
    }
}
