<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ViewComment;


class ViewController extends Controller
{
    public function submitComment(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in or register to submit a comment.');
        }
     
    
        if (auth()->user()->role !== 'visitor') {
            return redirect()->back()->with('error', 'Only visitors are allowed to submit comments.');
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:255',
        ]);
       
        ViewComment::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'visitor_id' => auth()->id(),
        ]);
    
        return redirect()->back();
    }


}
