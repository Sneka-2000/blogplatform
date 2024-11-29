<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\ViewComment;
use App\Models\AdminAction;


class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::whereIn('role', ['author', 'visitor'])
        ->select('id','name', 'role', 'status', 'created_at')
        ->get();

return view('admin.dashboard', ['users' => $users]);
    }
   
    public function blog()
    {
        $adminBlogs = Blog::where('user_type', 'admin')->get();
        $authorBlogs = Blog::where('user_type', 'author')->get();

        $blogs = $adminBlogs->merge($authorBlogs)->sortByDesc('created_at');

        return view('admin.blog', compact('blogs'));
    }
    public function create()
    {
        return view('admin.create');
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
    
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $imagePath;
        $blog->tags = $request->tags; 
        $blog->created_by = auth()->id(); 
        $blog->user_type = 'admin'; 
        $blog->save();
    
        return redirect()->route('admin.blog')->with('success', 'Blog added successfully!');
    }
    
    public function comment()
    {
        $comments = ViewComment::all();
        return view('admin.comment',compact('comments'));
    }
    

   public function handleCommentAction(Request $request, $commentId)
{
    $comment = ViewComment::findOrFail($commentId);

    if ($request->action == 'approved') {
        $comment->status = 'approved';
        $comment->save();

        AdminAction::create([
            'comment_id' => $commentId,
            'action' => 'approved',
        ]);

        return redirect()->back()->with('success', 'The comment has been approved.');
    } elseif ($request->action == 'rejected') {
        $comment->delete();

        AdminAction::create([
            'comment_id' => $commentId,
            'action' => 'rejected',
        ]);

        return redirect()->back()->with('success', 'The comment has been rejected.');
    }

    return redirect()->back()->with('error', 'Invalid action.');
}


  
public function role(Request $request, $id)
{
    $user = User::find($id);

    if ($user) {
        $request->validate([
            'role' => 'required|in:author,visitor',
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'User role updated successfully!');
    }

    return back()->with('error', 'User not found.');
}



  public function update($userId)
{
    $user = User::find($userId);

    if ($user) {
       
        $user->status = !$user->status;
        $user->save();
    }

    return back()->with('success', 'User status updated successfully!');
}

    

   
    
}
