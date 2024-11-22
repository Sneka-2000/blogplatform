<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','image','tags', 'created_by', 'user_type','user_id'];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    // Relationship with Author
    public function author()
    {
        return $this->belongsTo(Author::class, 'created_by');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
public function tags()
{
    return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id');
}

}
