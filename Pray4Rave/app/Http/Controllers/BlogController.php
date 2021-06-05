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
        $posts = Posts::orderBy('id', 'asc')->paginate(20);
        return view('elements.managePost', compact('posts'));
    }
    
    public function editAndSave(Request $request, $id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $request->validate([
            'tittle' => 'nullable|string|max:255|unique:posts',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:10',
            'link' => 'nullable|string|unique:posts',
        ]);
    

        $post=Posts::where('id',$id)->first();
        if($request->tittle != null){
            $post->tittle = $request->tittle;

        }
        if($request->description !=null){
            $post->description = $request->description;
        }
        if($request->category !=null){
            $post->category = $request->category;
        }
        if($request->link !=null){
            $post->link = $request->link;
        }
        
        $post->save();
        if($request->hasfile('images')){
            
            $image = Image::where('post_id', $post->id)->first();
            
            if(isset($image)){
                $images = $request->file('images');
                $name = time().'.'.$images->extension(); 
                $path = $images->move(public_path('images'), $name);
                $image->n_Img = $name;
                $image->save();
            }else{
                $images = $request->file('images');
                $name = time().'.'.$images->extension(); 
                $path = $images->move(public_path('images'), $name);

                $image = new Image();
                $image->n_Img = $name;
                $image->post_id = $post->id; 
                $image->save();
                
            }               
        }
        return back()->with('success', 'Post updated successfully');
    }  
    public function editar(Request $request, $id){
        $id_p = $id;

        return view('elements.editPost', compact('id_p'));
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
            $path = $images->move(public_path('images'), $name);
            
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
    public function delete(Request $request,$id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $post = Posts::where('id',$id)->first();
        $post->destroy($post->id);
        return redirect()->route('blog.blog');
    }
    public function filter($category){
        $f_posts = Posts::where('category', $category)->with('image')->paginate(10);
        
        
        return view('elements.filteredPost', compact('f_posts'));
    }
    public function postById($id){
        $post_id = Posts::with('image')->find($id);
        $comments = Comments::where('post_id', $id)->get();
        
        return view('elements.postById', compact('post_id', 'comments'));
    }
    
}
