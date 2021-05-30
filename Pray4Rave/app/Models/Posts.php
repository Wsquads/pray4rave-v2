<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['tittle', 'description', 'link', 'category'];

    public function image()
    {
        return $this->hasOne(Image::class, 'id');
    }
    public function coments()
    {
        return $this->hasMany(Comments::class, 'id');
    }

}
