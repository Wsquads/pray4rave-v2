<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['tittle', 'description', 'soundloud'];
    public function image()
    {
        return $this->hasOne(alabum_Img::class);
    }  
}
