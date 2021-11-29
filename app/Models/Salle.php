<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'num',
        'nom',
        'batiment',
        'etage'
    ];

    public function photos() {
        return $this->hasMany(Photo::class,'idSalle','id');
    }
}
