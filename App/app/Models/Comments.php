<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    use HasFactory;
    protected $table = "comment";

    


    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function reply(){
        return $this->hasMany(Comments::class,'ParentComment');
    }

    public function ParentComment(){

        return $this->belongsTo(Comments::class);
    }
}
