<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
'blog_title',
'blog_description',
'blog_body',
'likes'

    ];

    public function user()
    {
       return  $this->belongsTo(User::class,'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comments::class,'blog_id'); 
    }
    
}
