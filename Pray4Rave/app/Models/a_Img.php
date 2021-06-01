<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class a_Img extends Model
{
    use HasFactory;
    protected $fillable = ['artist_id', 'a_Img'];
    public function artist()
    {
        return $this->belongsTo(Artists::class);
    }    
}
