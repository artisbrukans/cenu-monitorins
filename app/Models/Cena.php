<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cena extends Model
{
    use HasFactory;
    protected $table = 'cena';
    protected $primaryKey = 'CenaID';

    protected $fillable = [
        'CenaParVienu',
        'CenaParVienibu',
        'AkcijaID',
    ];

    public function akcija()
    {
        return $this->belongsTo(Akcija::class, 'AkcijaID', 'AkcijaID');
    }
}
