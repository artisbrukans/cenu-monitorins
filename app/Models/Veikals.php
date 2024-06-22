<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veikals extends Model
{
    protected $table = 'Veikals';
    protected $primaryKey = 'VeikalsID';
    public $timestamps = false;

    protected $fillable = [
        'Nosaukums',
        'Iela',
        'Pilseta',
        'Valsts',
    ];

    // Relationship with CenuZime: One-to-Many
    public function cenuZimes()
    {
        return $this->hasMany(CenuZime::class, 'VeikalsID', 'VeikalsID');
    }
}
