<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenuZime extends Model
{
    use HasFactory;
    protected $table = 'cenu_zime';
    protected $primaryKey = 'CenuZimeID';

    protected $fillable = [
        'Svitrkods',
        'VeikalsID',
        'Datums',
        'CenaID',
    ];

    public function produkts()
    {
        return $this->belongsTo(Produkts::class, 'Svitrkods', 'Svitrkods');
    }

    public function veikals()
    {
        return $this->belongsTo(Veikals::class, 'VeikalsID', 'Veikals_ID');
    }

    public function cena()
    {
        return $this->belongsTo(Cena::class, 'CenaID', 'CenaID');
    }
}
