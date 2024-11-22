<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        if (Auth::user()->role == 'admin' || Auth::id() == $blog->created_by) {
            return view('admin.blog.edit', compact('blog'));
        } else {
            return redirect()->route('admin.blog')->with('error', 'You are not authorized to edit this post.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', 
            'tags' => 'required|string|max:255',
        ]);
    
        $blog = Blog::findOrFail($id);
    
        if (Auth::user()->role == 'admin' || Auth::id() == $blog->created_by) {
            $blog->title = $request->input('title');
            $blog->description = $request->input('description');
            $blog->tags = $request->input('tags');
    
            if ($request->hasFile('image')) {
                if ($blog->image && Storage::exists('public/' . $blog->image)) {
                    Storage::delete('public/' . $blog->image);
                }
    
                $imagePath = $request->file('image')->store('images', 'public');
                $blog->image = $imagePath;
            }
    
            $blog->save();
    
            return redirect()->route('admin.blog')->with('success', 'Blog updated successfully!');
        } else {
            return redirect()->route('admin.blog')->with('error', 'You are not authorized to edit this post.');
        }
    }

    
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin.blog')->with('success', 'Blog deleted successfully.');
    }
    
    
}
