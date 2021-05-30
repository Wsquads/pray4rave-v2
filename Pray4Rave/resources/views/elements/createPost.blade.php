@extends('welcome')
@section('content')
    
<form  method="post" action="{{ route('posts.savePost') }}" enctype="multipart/form-data"  class="mb-44 mt-16">
    @csrf
    
    <div>
      <div class="flex h-screen bg-gray-200 items-center justify-center  mt-32 mb-32">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
            <div class="flex justify-center py-4">
              <div class="flex  rounded-full md:p-4 p-2 ">
                  <img class="w-44" src="{{asset('/img/logo.png')}}" alt="">
              </div>
            </div>
        
            <div class="flex justify-center">
  
              <div class="flex">
  
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Upload a Post</h1>
                
              </div>
             
            </div>
            @if(session()->has('success'))
                <div class="flex justify-center">
                  {{ session()->get('success') }}
                </div>
            @endif
        
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">tittle</label>
              <input  name="tittle" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Tittle" />
              <!-- Error -->
              @if ($errors->has('tittle'))
                <div class="error">
                  {{ $errors->first('tittle') }}
                </div>
              @endif
            </div>
        
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">link</label>
                <input name="link" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Link" />
                <!-- Error -->
                @if ($errors->has('link'))
                  <div class="error">
                    {{ $errors->first('link') }}
                  </div> 
                @endif
              </div>
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">category</label>
                <select name="category" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                  <option value="audio">Audio</option>
                  <option value="technology">Technology</option>
                </select>
                @if ($errors->has('category'))
                  <div class="error">
                    {{ $errors->first('category') }}
                  </div> 
                @endif
              </div>
            </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
              <textarea name="description"class="w-full border-2 border-purple-300 h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600  rounded-lg focus:shadow-outline focus:border-purple-500"></textarea>
              @if ($errors->has('description'))
                <div class="error">
                  {{ $errors->first('description') }}
                </div> 
              @endif
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