<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cena extends Model
{
    protected $table = 'Cena';
    protected $primaryKey = 'CenaID';
    public $timestamps = false;

    protected $fillable = [
        'CenaParVienu',
        'CenaParVienibu',
        'AkcijaID',
    ];

    // Relationship with CenuZime: One-to-One or One-to-Many (depending on your application logic)
    public function cenuZimes()
    {
        return $this->hasMany(CenuZime::class, 'CenaID', 'CenaID');
    }

    // Relationship with Akcija: One-to-One
    public function akcija()
    {
        return $this->belongsTo(Akcija::class, 'AkcijaID', 'AkcijaID');
    }
}
