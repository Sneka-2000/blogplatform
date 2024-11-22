<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewComment extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','comment', 'visitor_id', 'status'];
}
