<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['description', 'user_id', 'post_id'];

    public function post()
    {
        return $this->belognsTo(Post::class, 'id');
    }
    public function user()
    {
        return $this->belognsTo(User::class, 'id');
    }
}
