<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'instrument_id',
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
            return $this->belongsTo(Instrument::class);
        }
        
        public function user()
        {
            return $this->belongsTo(User::class);
        }
        public function getPaginateByLimit(int $limit_count = 5)
        {
            // updated_atで降順に並べたあと、limitで件数制限をかける
            return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        }
}
