<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produkts extends Model
{
    protected $table = 'Produkts';
    protected $primaryKey = 'Svitrkods';
    public $timestamps = false;

    protected $fillable = [
        'Nosaukums',
        'Daudzums',
        'Mervieniba',
    ];

    // Relationship with CenuZime: One-to-Many
    public function cenuZimes()
    {
        return $this->hasMany(CenuZime::class, 'Svitrkods', 'Svitrkods');
    }
}
