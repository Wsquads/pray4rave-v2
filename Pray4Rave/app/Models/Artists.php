<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    use HasFactory;
    protected $table = 'artists';
    protected $fillable = ['c_name', 'description', 'l_soundcloud', 'l_instagram', 'soundcloud', 'birthdate'];

    public function image()
    {
        return $this->hasOne(a_Img::class, 'id');
    }
    
    
}
