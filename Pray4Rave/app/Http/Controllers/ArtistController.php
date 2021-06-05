<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artists;
use App\Models\a_Img;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
    public function index(){
        $artists = Artists::orderBy('created_at','desc')->with('image')
                ->take(10)
                ->get();;
        return view('elements.artists', compact('artists'));
    }
    public function manageArtists(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }   
        $artists = Artists::orderBy('id', 'asc')->paginate(10);
        return view('elements.manageArtists', compact('artists'));
    }
    public function saveArtist(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $validator = Validator::make($request->all(), [
            'c_name' => 'required|string|max:100',
            'nick' => 'required|string|max:10',
            'description' => 'required',
            'l_soundcloud' => 'required|string|max:255',
            'l_instagram' => 'required|string|max:255',
            'birthdate' => 'required',
            'image' => 'required'


        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        if ($request->hasfile('image')) {

            $artist =new Artists();
            $artist->c_name = $request->c_name;
            $artist->birthdate = $request->birthdate;
            $artist->nick = $request->nick;
            $artist->description = $request->description;
            $artist->l_soundcloud = $request->l_soundcloud;
            $artist->l_instagram = $request->l_instagram;
            $artist->soundcloud = $request->soundcloud;
            

            $artist->save();
            $artist_id = $artist->id;

            $images = $request->file('image');
            $name = time().'.'.$images->extension();
            $path = $images->move(public_path('images'), $name);

                        
            $img = new a_Img();
            $img->artist_id = $artist_id;
            $img->n_Img = $name;
            $img->save();
            
        }
        return back()->with('success', 'Artist uploaded successfully');
    }
    public function artistById($id){
        $artistById = Artists::where('id', $id)->with('image')->first();
        return view('elements.artistById',compact('artistById'));
    }

    public function editAndSave(Request $request, $id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $validator = Validator::make($request->all(), [
            'c_name' => 'nullable|string|max:100',
            'nick' => 'nullable|string|max:10',
            'description' => 'nullable',
            'l_soundcloud' => 'nullable|string|max:255',
            'l_instagram' => 'nullable|string|max:255',
            'birthdate' => 'nullable',


        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
    
        $artist = Artists::where('id',$id)->first();
        if($request->c_name != null){
            $artist->c_name = $request->c_name;
        }
        if($request->birthdate !=null){
            $artist->birthdate = $request->birthdate;
        }
        if($request->description !=null){
            $artist->description = $request->description;
        }
        if($request->nick !=null){
            $artist->nick = $request->nick;
        }
        if($request->soundcloud !=null){
            $artist->soundcloud = $request->soundcloud;
        }
        if($request->l_soundcloud !=null){
            $artist->l_soundcloud = $request->l_soundcloud;
        }
        if($request->l_instagram !=null){
            $artist->l_instagram = $request->l_instagram;
        }
        
        $artist->save();
        if($request->hasfile('image')){
            
            $image = a_Img::where('artist_id', $artist->id)->first();
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

                $image = new a_Img();
                $image->n_Img = $name;
                $image->artist_id = $artist->id; 
                $image->save();
                
            }               
        }
        return back()->with('success', 'Artist updated successfully');
    }  
    public function editar(Request $request, $id){
        $id_a = $id;

        return view('elements.editArtist', compact('id_a'));
    }
    public function delete(Request $request,$id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $artist = Artists::where('id',$id)->first();
        $artist->destroy($artist->id);
        return redirect()->route('blog.blog');
    }
}
