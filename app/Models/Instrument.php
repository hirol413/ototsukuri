<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instrument extends Model
{
    use HasFactory;
    
        
        public function posts()
        {
            return $this->hasMany(Post::class);
        }
        
        public function getByInstrument(int $limit_count = 10)
        {
             return $this->posts()->with('instrument')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        }
}