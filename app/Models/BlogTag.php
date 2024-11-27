<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;
    protected $fillable = ['name','blog_id','tag_id'];
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
