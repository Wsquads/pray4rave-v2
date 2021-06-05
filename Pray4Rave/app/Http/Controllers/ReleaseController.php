<?php

namespace App\Http\Controllers;

use App\Models\Release;
use App\Models\Album;
use App\Models\alabum_Img;
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
        $albums = Album::orderBy('id','asc')->paginate(10);
        return view('elements.manageRelease', compact('albums'));
    }
    public function saveAlbum(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $request->validate([
            'tittle' => 'required|string|max:255',
            'description' => 'required|string',
            'soundcloud' => 'required|string',
            'image' => 'required',
        ]);
        
        if ($request->hasfile('image')) {

            $album=new Album();
            $album->tittle = $request->tittle;
            $album->description = $request->description;
            $album->soundcloud = $request->soundcloud;
            $album->save();
            $a_id = $album->id;

            $image = $request->file('image');
            $name = time().'.'.$image->extension();
            $path = $image->move(public_path('images'), $name);
            
            
            alabum_Img::create([
                'album_id' => $a_id,
                'n_Img' => $name,
            ]);
            
        }
        return back()->with('success', 'Album uploaded successfully');
    }
}
