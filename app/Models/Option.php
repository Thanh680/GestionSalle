<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'libelle',
        'fileName',
        'idSalle',
    ];

    protected static function boot() {
        parent::boot();
        static::deleting(function($info) {
        if ( File::exists('uploads/photoOption/'.$info->fileName)) {
                File::delete('uploads/photoOption/'.$info->fileName);
            } 
        });
    }
}
