<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alabum_Img extends Model
{
    use HasFactory;
    protected $fillable = ['album_id', 'n_Img'];
    public function album()
    {
        return $this->belongsTo(Album::class);
    }    
}
