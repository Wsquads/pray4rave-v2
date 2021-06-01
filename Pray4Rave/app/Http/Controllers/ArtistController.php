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
    public function manageArtists(){
        return view('elements.manageArtists');
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
            
            $path = $images->storeAs('public', $name);
            
            $img = new a_Img();
            $img->artist_id = $artist_id;
            $img->n_Img = $name;
            $img->save();
            
        }
        return back()->with('success', 'Artist uploaded successfully');
    }
    public function artistById($id){
        $artistById = Artists::where('id', $id)->with('image');
        return view('elements.artistById',compact('artistById'));
    }
}
