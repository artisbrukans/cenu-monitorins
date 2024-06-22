<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CenuZime extends Model
{
    protected $table = 'CenuZime';
    protected $primaryKey = 'CenuZimeID';
    public $timestamps = false;

    protected $fillable = [
        'Svitrkods',
        'VeikalsID',
        'Datums',
        'CenaID',
    ];

    // Relationship with Produkts: One-to-One
    public function produkts()
    {
        return $this->belongsTo(Produkts::class, 'Svitrkods', 'Svitrkods');
    }

    // Relationship with Veikals: One-to-One
    public function veikals()
    {
        return $this->belongsTo(Veikals::class, 'VeikalsID', 'VeikalsID');
    }

    // Relationship with Cena: One-to-One
    public function cena()
    {
        return $this->belongsTo(Cena::class, 'CenaID', 'CenaID');
    }
}
