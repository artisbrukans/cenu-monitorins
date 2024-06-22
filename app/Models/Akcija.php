<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akcija extends Model
{
    protected $table = 'Akcija';
    protected $primaryKey = 'AkcijaID';
    public $timestamps = false;

    protected $fillable = [
        'AkcijaSpeka',
        'AkcijasCena',
    ];

    // Relationship with Cena: One-to-One or One-to-Many (depending on your application logic)
    public function cena()
    {
        return $this->hasOne(Cena::class, 'AkcijaID', 'AkcijaID');
    }
}
