@extends('welcome')
@section('content')
<form  method="post" action="{{ route('manageUsers.editAndSave',['id'=>$id_u]) }}" enctype="multipart/form-data"  class=" ">
    @csrf
    
    <div>
      <div class="flex h-screen bg-gray-200 items-center justify-center  mt-14">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
            <div class="flex justify-center py-4">
              <div class="flex  rounded-full md:p-4 p-2 ">
                  <img class="w-44" src="{{asset('/img/logo.png')}}" alt="">
              </div>
            </div> 
        
            <div class="flex justify-center">
  
              <div class="flex">
  
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Update a User</h1>
                
              </div>
             
            </div>
            @if(session()->has('success'))
                <div class="flex justify-center">
                  {{ session()->get('success') }}
                </div>
            @endif
        
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name</label>
              <input  name="name" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Name" />
              <!-- Error -->
              @if ($errors->has('name'))
                <div class="error">
                  {{ $errors->first('name') }}
                </div>
              @endif
            </div>
        
            <div class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7">
              <div class="grid grid-cols">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">email</label>
                <input name="email" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Email" />
                <!-- Error -->
                @if ($errors->has('email'))
                  <div class="error">
                    {{ $errors->first('email') }}
                  </div> 
                @endif
              </div>
            </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>
                <input type='file' name="images" accept="image/*" class="file"/>
                @if ($errors->has('files'))
                  @foreach ($errors->get('files') as $error)
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $error }}</strong>
                    </span>
                  @endforeach
                @endif
            </div>
            
        
            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-8 pb-5'>
              <button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' >Create</button>
            </div>
        
          </div>
          
        </div>
  </div>
  </form>
@endsection