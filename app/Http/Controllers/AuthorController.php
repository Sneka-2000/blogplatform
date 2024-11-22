<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Blog;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function dashboard()
    { 
        $products = Blog::where('user_type', 'author')->where('created_by', auth()->id())->get();

        return view('author.dashboard', compact('products'));
        
       
    }
    public function create()
    {
        return view('author.create');
    }

     public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'tags' => 'required|string|max:255',
        ]);
    
        $imagePath = $request->file('image')->store('images', 'public');
    
        $product = new Blog();
        $product->title = $request->title;
        $product->description = $request->description;

        $product->image = $imagePath; 
        $product->tags = $request->tags;
        $product->created_by = auth()->id(); 
        $product->user_type = 'author'; 
        $product->save();
    
        return redirect()->route('author.dashboard')->with('success', 'Blog added successfully!');;
    }   
    public function edit($id)
    {
        $product = Blog::findOrFail($id);  
        return view('author.edit', compact('product'));  
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|nullable|max:5120',
            'tags' => 'required|string|max:255',
        ]);
    
        $blog = Blog::findOrFail($id);  
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $blog->image = $imagePath; 
        }
    
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
    
        $blog->save();  
    
        return redirect()->route('author.dashboard')->with('success', 'Blog updated successfully.');
    }
    
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('author.dashboard')->with('success', 'Blog deleted successfully.');
    }
    
}
