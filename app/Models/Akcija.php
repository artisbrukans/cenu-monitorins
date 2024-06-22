<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akcija extends Model
{
    use HasFactory;
    protected $table = 'akcija';
    protected $primaryKey = 'AkcijaID';

    protected $fillable = [
        'AkcijaSpeka',
        'AkcijasCena',
    ];
}
