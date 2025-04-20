<?php
namespace App\Http\Controllers;
use App\Models\post;
use App\Models\new_post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $postsFromDB = post::all();  
      
        return view('posts.index', ['posts' => $postsFromDB]);
    
        }

    public function show($id){
        $postsFromDB = post::findorfail($id);
        // if (is_null($postsFromDB)) {
        //     return to_route('posts.index');
        // }

        return view('posts.show', ['post' => $postsFromDB]);
        }



    public function create() {
        $users= User::all();
        return view ('posts.create',['users'=>$users]);
        }

        public function store(Request $request)
        {
            
            $validated = $request->validate([
                'title' => 'required|string|max:255|unique:post',
                'description' => 'required|string',
                'postcreator' => 'required|exists:users,id'
            ]);
        
            
            $post = post::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'user_id' => $validated['postcreator']
            ]);
        
            return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully');
        }

        public function edit(post $post) 
        {

            $users= User::all();
            return view ('posts.edit',['users'=>$users,'post'=>$post]);
        }

        public function update($postId)
        {
            
            request()->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'postcreator' => 'required|exists:users,id'
            ]);
        
            $post = Post::findOrFail($postId);
        
              $post->update([
                'title' => request()->title,
                'description' => request()->description,
                'user_id' => request()->postcreator 
            ]);
        
            
            return redirect()->route('posts.show', $post->id);
        }






      

    public function destroy($id)  {

        $post = post::find($id);
        $post->delete();
        return to_route('posts.index');
    }

    
// public function storeOrUpdate(Request $request)
// {
//     $validated = $request->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'postcreator' => 'required|exists:users,id'
//     ]);
    
//     $post = Post::updateOrCreate(
//         ['title' => $validated['title']], // Match by title
//         [
//             'description' => $validated['description'],
//             'postcreator' => $validated['postcreator']
//         ]
//     );
    
//     return redirect()->route('posts.show', $post->id)
//         ->with('success', 'Post saved successfully');
// }
    
}