<?php

namespace App\Models;

use App\Models\Salle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'fileName',
        'idSalle',
    ];
    public function salle()
    {
        return $this->belongsTo(Salle::class);
    } 

    protected static function boot() {
        parent::boot();
        static::deleting(function($photo) {
        if ( File::exists('uploads/photo/'.$photo->fileName)) {
                File::delete('uploads/photo/'.$photo->fileName);
            } 
        });
    }
    
}
