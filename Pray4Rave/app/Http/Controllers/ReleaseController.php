<?php

namespace App\Http\Controllers;

use App\Models\Release;
use App\Models\Album;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('elements.releases');
    }

    public function search(Request $request){
        if(!$request->tittle || $request->tittle == null){
            return redirect()->route('releases.releases');
        }
        
        if($request->r_type == 'all'){
            return back();

        }elseif($request->r_type == 'release'){
            $s_posts = Release::where('tittle', 'Like', '%' . request('tittle') . '%')->where('category', $request->category)->with('image')->paginate(10);
            return view('elements.searchPost', compact('s_posts'));

        }
        elseif($request->r_type == 'albums'){
            $s_posts = Album::where('tittle', 'Like', '%' . request('tittle') . '%')->where('category', $request->category)->with('image')->paginate(10);
            return view('elements.searchPost', compact('s_posts'));
        }
        return redirect()->route('blog.posts');
    }
    public function manageReleases(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        return view('elements.manageRelease');
    }
    public function saveRelease(Request $request){
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
}
