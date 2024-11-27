<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\ViewComment;


class CommentController extends Controller
{
    public function blog(){
        $blogs = Blog::paginate(4);
        return view('static.blog', compact('blogs'))->with('success', 'Your comment has been submitted and is awaiting approval.');
    }
    public function show($id)
    {
        
        $blog = Blog::find($id); 
        $comments = ViewComment::where('status', 'approved')->get();


        if (!$blog) {
            return abort(404, 'Blog not found'); 
        }
    
        return view('static.singleblog', compact('blog','comments'))->with('success', 'Your comment has been submitted and is awaiting approval.'); // Pass the single blog to the view
    }
  
    
}