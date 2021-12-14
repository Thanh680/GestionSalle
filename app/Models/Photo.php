<?php

namespace App\Models;

use App\Models\Salle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'fileName',
        'idSalle'
    ];
    public function salle()
    {
        return $this->belongsTo(Salle::class);
    } 
}
