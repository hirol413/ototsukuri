<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'profiles_id',
        'instruments_id',
        'title',
        'sound',
        'img',
        'text',
        ];
        
        public function tags()
        {
            return $this->belongsToMany(Tag::class);
        }
        
        public function instrument()
        {
            return $this->hasMany(instrument::class);
        }
}
