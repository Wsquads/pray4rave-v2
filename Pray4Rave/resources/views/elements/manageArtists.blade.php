@extends('welcome')
@section('content')
    
<form  method="post" action="{{ route('manageArtists.saveArtist') }}" enctype="multipart/form-data"  class="py-32">
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
  
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Upload an Artist</h1>
                
              </div>
             
            </div>
            @if(session()->has('success'))
                <div class="flex justify-center">
                  {{ session()->get('success') }}
                </div>
            @endif
        
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">nickname</label>
              <input  name="nick" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="nick" />
              <!-- Error -->
              @if ($errors->has('nick'))
                <div class="error">
                  {{ $errors->first('nick') }}
                </div>
              @endif
            </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Complete Name</label>
                <input  name="c_name" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Complete Name" />
                <!-- Error -->
                @if ($errors->has('c_name'))
                  <div class="error">
                    {{ $errors->first('c_name') }}
                  </div>
                @endif
              </div>
        
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">soundcloud profile link</label>
                <input name="l_soundcloud" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="soundcloud profile link" />
                <!-- Error -->
                @if ($errors->has('l_soundcloud'))
                  <div class="error">
                    {{ $errors->first('l_soundcloud') }}
                  </div> 
                @endif
              </div>

              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">instagram link</label>
                <input name="l_instagram" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="instagram link" />
                <!-- Error -->
                @if ($errors->has('l_instagram'))
                  <div class="error">
                    {{ $errors->first('l_instagram') }}
                  </div> 
                @endif
              </div>
            </div>
            
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">soundcloud Releases frame</label>
              <textarea name="soundcloud"class="w-full border-2 border-purple-300 h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600  rounded-lg focus:shadow-outline focus:border-purple-500"></textarea>
              @if ($errors->has('soundcloud'))
                <div class="error">
                  {{ $errors->first('soundcloud') }}
                </div> 
              @endif
            </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">description</label>
                <textarea name="description"class="w-full border-2 border-purple-300 h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600  rounded-lg focus:shadow-outline focus:border-purple-500"></textarea>
                @if ($errors->has('description'))
                  <div class="error">
                    {{ $errors->first('description') }}
                  </div> 
                @endif
            </div>
            <div class="my-4 flex  justify-center ">
                <label class="uppercase pr-2 pt-4 md:text-sm text-xs text-gray-500 text-light font-semibold">birth date</label>
                <input name="birthdate" class="py-2 px-3 rounded-lg max-w-md border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" placeholder="instagram link" />
                <!-- Error -->
                @if ($errors->has('birthdate'))
                  <div class="error">
                    {{ $errors->first('birthdate') }}
                  </div> 
                @endif
              </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>
                <input type='file' name="image" accept="image/*" class="file rounuded p-2"/>
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