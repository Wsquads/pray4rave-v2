@extends('welcome')
@section('content')
<div>
    <div>
        <div class="main">
            <div class="px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
        
                <!-- hero -->
                <div class="hero">
                    <!-- hero headline -->
                    <div class="hero-headline flex flex-col items-center justify-center pt-24 text-center">
                        <h1 class=" font-bold text-3xl text-gray-900">Pray4rave reviews</h1>
                        <p class=" font-base text-base text-gray-600">Search for any review with the posibility of filtering  audio or technology.</p>
                    </div>
        
                    <!-- image search box -->
                    <div class="box pt-6">
                        <div class="box-wrapper">
                          <form action="{{route('blog.search')}}">
                            @csrf
                            <div class=" bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200">
                              <input type="text" name="tittle" id="" placeholder="search for images" class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent">
                              <div class="select">
                                <select name="category" id="" class="text-sm outline-none focus:outline-none bg-transparent">
                                  <option value="all" selected>All</option>
                                  <option value="audio">Audio</option>
                                  <option value="technology">Technology</option>
                                </select>
                              </div>
                              <button type="submit" class="outline-none focus:outline-none px-2"><svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                            </div>
                          </form>
                        </div>
                    </div>
                  
                </div>
                
            </div>
            <div class="pl-10">
                <div class="flex mt-8  px-4 lg:px-0 items-center justify-between">
                    <h2 class="font-bold pl-4 text-3xl">Searched Posts</h2>
                    <a href="{{route('blog.posts')}}" class="py-1 px-3 mr-10 text-md font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-1 border-gray-900 rounded hover:bg-gray-800 cursor-pointer">
                      View all
                    </a>
                  </div>
                  <div class="grid lg:grid-cols-4 sm:grid-cols-1 md:grid-cols-2 pt-24 space-x-0 lg:flex lg:space-x-6">
                    <div class="grid gap-6  mb-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                      @foreach ($s_posts as $post)
                        @php
                              $s_img = $post->image;
                        @endphp
                        
                        <div class="w-full">
                          <a href="{{route('blog.post', ['id'=>$post->id])}}" class=" rounded cursor-pointer">
                            <img src="{{asset('images')}}/{{$s_img->n_Img}}" class="rounded w-full" alt="technology" />
                          </a>
                        </div>
                        <a href="{{route('blog.post', ['id'=>$post->id])}}"  class="pt-4 hover:bg-purple-200 w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                          <div class="">
                            <div class="px-5  py-3">
                              <h3 class="font-bold text-gray-700 mb-2 uppercase">{{$post->tittle}}</h3>
                              <span class="text-gray-500 uppercase mt-4">{{$post->category}}</span>
                            </div>
                          </div>
                        </a>
                      @endforeach
                    </div>
                  </div>
          
            </div>
        </div>
    </div>
    
</div>

@endsection