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
    
        $sentences = [];
    
        if ($blog) {
           
            if (!empty($blog->tags)) {
                $sentences = explode('~', $blog->tags);
            }
        } else {
            return back()->with('error', 'Blog not found.');
        }
    
        
        return view('static.singleblog', compact('blog', 'comments', 'sentences'))
            ->with('success', 'Your comment has been submitted and is awaiting approval.');
    }
  
    
}
