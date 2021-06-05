<?php

namespace App\Http\Controllers;

use App\Models\Release;
use App\Models\Album;
use App\Models\alabum_Img;
use Illuminate\Http\Request;
use Validator;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->paginate(10);
        return view('elements.releases', compact('albums'));
    }

    
    public function manageReleases(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $albums = Album::orderBy('id','desc')->paginate(10);
        $releases = Release::orderBy('id','desc')->paginate(10);
        return view('elements.manageRelease', compact('albums', 'releases'));
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
    
    public function editAlbumAndSave(Request $request, $id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $validator = Validator::make($request->all(), [
            'tittle' => 'nullable|string|max:100',
            'soundcloud' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
    
        $album = Album::where('id',$id)->first();
        if($request->tittle != null){
            $album->tittle = $request->tittle;
        }
        if($request->description !=null){
            $album->description = $request->description;
        }
        if($request->soundcloud !=null){
            $album->soundcloud = $request->soundcloud;
        }
        
        $album->save();
        if($request->hasfile('image')){
            
            $image = alabum_Img::where('album_id', $album->id)->first();
            if(isset($image)){
                $images = $request->file('image');
                $name = time().'.'.$images->extension(); 
                $path = $images->move(public_path('images'), $name);
                $image->n_Img = $name;
                $image->save();
            }else{
                $images = $request->file('image');
                $name = time().'.'.$images->extension(); 
                $path = $images->move(public_path('images'), $name);

                $image = new alabum_Img();
                $image->n_Img = $name;
                $image->album_id = $album->id; 
                $image->save();
                
            }               
        }
        return back()->with('success', 'Album updated successfully');
    }  
    public function editar(Request $request, $id){
        $id_a = $id;

        return view('elements.editAlbum', compact('id_a'));
    }
    public function delete(Request $request,$id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $album = Album::where('id',$id)->first();
        $album->destroy($album->id);
        return redirect()->route('releases.releases');
    }
    public function saveRelease(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $request->validate([
            'tittle' => 'nullable|string|max:255',
            'soundcloud' => 'nullable|string',
        ]);
       
        $category = [];

        if(isset($request->category1)){
            array_push($category, $request->category1);
        }
        if(isset($request->category2)){
            array_push($category, $request->category2);

        }
        if(isset($request->category3)){
            array_push($category, $request->category3);
            
        }
        if(isset($request->category4)){
            array_push($category, $request->category4);
            
        }
        if(isset($request->category5)){
            array_push($category, $request->category5);
            
        }
        if(isset($request->category6)){
            array_push($category, $request->category6);
            
        }
        $category = json_encode($category, JSON_FORCE_OBJECT);
        
        $release=new Release();
        $release->tittle = $request->tittle;
        $release->album_id = $request->album;
        $release->soundcloud = $request->soundcloud;
        $release->category = $category;
        $release->save();

        return back()->with('success', 'Release uploaded successfully');
    }
    public function editarRelease(Request $request, $id){
        $id_a = $id;
        $albums = Album::all();
        return view('elements.editRelease', compact('id_a', 'albums'));
    }
    public function deleteRelease(Request $request,$id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $release = Release::where('id',$id)->first();
        $release->destroy($release->id);
        return redirect()->route('releases.releases');

    }
    public function editReleaseAndSave(Request $request, $id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $request->validate([
            'tittle' => 'nullable|string|max:255',
            'soundcloud' => 'nullable|string',
        ]);
       
        $category = [];

        if(isset($request->category1)){
            array_push($category, $request->category1);
        }
        if(isset($request->category2)){
            array_push($category, $request->category2);

        }
        if(isset($request->category3)){
            array_push($category, $request->category3);
            
        }
        if(isset($request->category4)){
            array_push($category, $request->category4);
            
        }
        if(isset($request->category5)){
            array_push($category, $request->category5);
            
        }
        if(isset($request->category6)){
            array_push($category, $request->category6);
            
        }
        
        $category = json_encode($category, JSON_FORCE_OBJECT);
        $release = Release::where('id', $id)->first();
       
        if(isset($request->tittle)){
            $release->tittle = $request->tittle;
        }
        if(isset($request->album)){
            $release->album_id = $request->album;
        }
        if(isset($request->soundcloud)){
            $release->soundcloud = $request->soundcloud;
        }
        if(isset($request->category1)||isset($request->category2)||isset($request->category3)||isset($request->category4)||isset($request->category5)||isset($request->category6)){
            $release->category = $category;
        }
        $release->save();

        return back()->with('success', 'Release uploaded successfully');
    }
}
