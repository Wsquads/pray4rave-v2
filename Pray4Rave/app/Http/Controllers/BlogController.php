<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Image;
use App\Models\Comments;

class BlogController extends Controller
{
    public function index(){
        $postsByDate =  Posts::orderBy('created_at','desc')->with('image')
                        ->take(4)
                        ->get();
        $audioPosts = Posts::where('category', 'audio')->orderBy('created_at','desc')->with('image')
                        ->take(4)
                        ->get();
        $technologyPosts = Posts::where('category', 'technology')->orderBy('created_at','desc')->with('image')
                        ->take(4)
                        ->get();
        return view('elements.blog', compact('postsByDate', 'technologyPosts', 'audioPosts'));
    }
    public function managePost(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        return view('elements.managePost');
    }
    public function savePost(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $request->validate([
            'tittle' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:10',
            'link' => 'required|string',
            'images' => 'required',
        ]);
        
        if ($request->hasfile('images')) {

            $post=new Posts();
            $post->tittle = $request->tittle;
            $post->description = $request->description;
            $post->link = $request->link;
            $post->category = $request->category;
            $post->save();
            $p_id = $post->id;

            $images = $request->file('images');
            $name = time().'.'.$images->extension();
            $path = $images->storeAs('public', $name);
            
            Image::create([
                'post_id' => $p_id,
                'n_Img' => $name,
                'p_Img' => '/storage/app/  '.$path
            ]);
            
        }
        return back()->with('success', 'Post uploaded successfully');
    }
    public function search(Request $request){
        if(!$request->tittle || $request->tittle == null){
            return redirect()->route('blog.posts');
        }
        
        if($request->category == 'all'){
            $s_posts = Posts::where('tittle', 'Like', '%' . request('tittle') . '%')->with('image')->paginate(10);
            return view('elements.searchPost', compact('s_posts'));

        }elseif($request->category == 'audio'){
            $s_posts = Posts::where('tittle', 'Like', '%' . request('tittle') . '%')->where('category', $request->category)->with('image')->paginate(10);
            
            return view('elements.searchPost', compact('s_posts'));

        }
        elseif($request->category == 'technology'){
            $s_posts = Posts::where('tittle', 'Like', '%' . request('tittle') . '%')->where('category', $request->category)->with('image')->paginate(10);
            return view('elements.searchPost', compact('s_posts'));
        }
        return redirect()->route('blog.posts');
    }
    public function posts(){

        $posts = Posts::with('image')->paginate(35);
        return view('elements.posts', compact('posts'));

        
    }
    public function filter($category){
        $f_posts = Posts::where('category', $category)->with('image')->paginate(10);
        
        
        return view('elements.filteredPost', compact('f_posts'));
    }
    public function postById($id){
        $post_id = Posts::where('id', $id)->with('image','coments')->first();
        
        
        return view('elements.postById', compact('post_id'));
    }
    
}
