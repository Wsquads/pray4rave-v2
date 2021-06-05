<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\u_Img;

class UserController extends Controller
{
    public function manageUsers(Request $request){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $users = User::orderBy('id', 'asc')->paginate(20);
        return view('elements.manageUsers', compact('users'));
    }
    public function delete(Request $request,$id){
        if($request->user()->is_admin == 0){
            return redirect()->route('home');
        }
        $user = User::where('id',$id)->first();
        $user->delete($user->id);
        return back();
    }


    public function editar(Request $request, $id){
        $id_u = $id;

        return view('elements.editUser', compact('id_u'));
    }



    public function editAndSave(Request $request, $id){
        $request->validate([
            'name' => 'nullable|string|max:13|unique:users',
            'email' => 'nullable|string|unique:users',
        ]);
        
    

        $user=User::where('id',$id)->first();
        if($request->name != null){
            $user->name = $request->name;

        }elseif($request->email !=null){
            $user->email = $request->email;
        }
        $user->save();
        if($request->hasfile('images')){
            
            $u_Img = u_Img::where('user_id', $user->id)->first();
            if(isset($u_Img)){
                $images = $request->file('images');
                $name = time().'.'.$images->extension();
                $path = $images->move(public_path('images'), $name);
                $u_Img->n_Img = $name;
                $u_Img->save();
            }else{
                $images = $request->file('images');
                $name = time().'.'.$images->extension(); 
                $path = $images->move(public_path('images'), $name);
                $u_Img = new u_Img();
                $u_Img->n_Img = $name;
                $u_Img->user_id = $user->id; 
                $u_Img->save();
                
            }               
        }
        return back()->with('success', 'user updated successfully');
    }          
}
