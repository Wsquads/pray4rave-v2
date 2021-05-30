@extends('welcome')
@section('content')
    

<div class="blogs__wraper py-20 px-20">
     
    <div class="max-w-screen-lg mx-auto">
      
        <div class="border-1">
  
          
          <!-- end featured section -->
          <div class="pb-8  mb-4
           pt-4  text-center">
            <h1 class="pb-4 font-semibold text-7xl mb-4 text-center">BLOG</h1>
  
            <div class="box mb-8">
              <div class="box-wrapper">
                <form action="{{route('blog.search')}}">
                  @csrf
                  <div class=" bg-white rounded flex items-center w-full p-3 ">
                    <input type="text" name="tittle" id="" placeholder="search for post" class="rounded w-full pl-4 text-sm outline-none focus:outline-none bg-transparent">
                    <div class="select">
                      <select name="category" id="" class="font-sans rounded text-sm outline-none focus:outline-none bg-transparent">
                        <option value="all" selected>All</option>
                        <option value="audio">Audio</option>
                        <option class="" value="technology">Technology</option>
                      </select>
                    </div>
                    <button type="submit" class="px-4 outline-none focus:outline-none"><svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                  </div>
                </form>
              </div>
          </div>
            <a href="{{route('blog.posts')}}" class="py-3 mt-8 px-3 text-md font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-1 border-gray-900 rounded hover:bg-gray-800 cursor-pointer">
              (View all posts)
            </a>
    
          </div>
          <div class="flex flex-wrap  w-full md:flex-no-wrap space-x-0 md:space-x-6 mb-4">
            <!-- main post -->
            <div class="mb-4 lg:mb-8 p-4 lg:p-0 w-full relative rounded block">
              <img src="{{asset('/img/DSC00269.JPG')}}" class="rounded-md object-cover w-full h-64">
            </div>
          </div>
        </div>
        <!-- featured section -->
  
        <!-- recent posts -->
        <div class="flex mt-8  px-4 lg:px-0 items-center justify-between">
            <h2 class="font-bold text-3xl">Latest news</h2>
            <a href="{{route('blog.posts')}}" class="py-1 px-3 text-md font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-1 border-gray-900 rounded hover:bg-gray-800 cursor-pointer">
              View all
            </a>
          </div>
          <div class="grid lg:grid-cols-4 sm:grid-cols-1 md:grid-cols-2 pt-24 space-x-0 lg:flex lg:space-x-6">
            
            
            @foreach ($postsByDate as $postDated)
              <div class="rounded  w-full lg:w-1/2 lg:w-1/3  lg:p-0">
                
                  @php
                      $img = $postDated->image;
                  @endphp
                  @if ($img !=null)
                    <div class="lg:h-3/5 w-full">
                      <a href="{{route('blog.post', ['id'=>$postDated->id])}}" class=" rounded cursor-pointer">
                        <img src="{{asset('/storage/'.$img->n_Img)}}" class="rounded w-full" alt="technology" />
                      </a>
                    </div>
                      
                  @endif
                  <hr>
                  <br>
                <div class=" rounded hover:bg-gray-200 grid rows grid-flow-row md:auto-rows-min w-full">
                  <div>
                    <a href="{{route('blog.post', ['id'=>$postDated->id])}}">
                      <h2 class="font-bold text-2xl text-gray-700 uppercase hover:text-purple-500">{{$postDated->tittle}}</h2>
                    </a>
                  </div>
                  <div>
                    <p class="text-gray-700 uppercase mt-2">
                      {{__($postDated->category)}}
                    </p>
                  </div>
                  <br>
                  
                </div>
              </div>
            @endforeach
          </div>
  
        <!-- end recent posts -->
        
        <!-- subscribe -->
        <div class="rounded flex bg-gray-200  md:shadow mt-10">
          <img src="https://images.unsplash.com/photo-1579275542618-a1dfed5f54ba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="w-0 md:w-1/4 object-cover rounded-l" />
          <div class="px-4 py-2">
            <h3 class="text-3xl text-gray-800 font-bold">Subscribe to newsletter</h3>
            <p class="text-xl text-gray-700">We sent latest news and posts once in every week, fresh from the oven</p>
            <form class="mt-4 mb-10">
              <input type="email" class="rounded bg-gray-100 px-4 py-2 border focus:border-green-400" placeholder="john@tech.com"/>
              <button class="px-4 py-2 rounded bg-green-800 text-gray-100">
                Subscribe
                <i class='bx bx-right-arrow-alt' ></i>
              </button>
              <p class="text-green-900 opacity-50 text-sm mt-1">No spam. We promise</p>
            </form>
          </div>
        </div>
        <!-- ens subscribe section -->
  
  
  
        <!-- recent posts -->
        <div class="flex mt-8  px-4 lg:px-0 items-center justify-between">
          <h2 class="font-bold text-3xl">Audio news</h2>
          <a href="{{route('blog.posts')}}" class="py-1 px-3 text-md font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-1 border-gray-900 rounded hover:bg-gray-800 cursor-pointer">
            View all
          </a>
        </div>
        <div class="grid lg:grid-cols-4 sm:grid-cols-1 md:grid-cols-2 pt-24 space-x-0 lg:flex lg:space-x-6">
          @foreach ($audioPosts as $a_post)
            <div class="rounded  w-full lg:w-1/2 lg:w-1/3  lg:p-0">
              
                @php
                    $a_img = $a_post->image;
                @endphp
                <div class="lg:h-2/5 w-full">
                  <a href="{{route('blog.post', ['id'=>$a_post->id])}}" class=" rounded cursor-pointer">
                    <img src="{{asset('/storage/'.$a_img->n_Img)}}" class="rounded w-full" alt="technology" />
                  </a>
                </div>
                <div class=" rounded hover:bg-gray-200 mt-12 grid rows grid-flow-row md:auto-rows-min w-full">
                <hr>
                <br>
                <div>
                  <a href="{{route('blog.post', ['id'=>$a_post->id])}}">
                    <h2 class="font-bold text-2xl text-gray-800 hover:text-purple-500">{{$a_post->tittle}}</h2>
                  </a>
                </div>
                <div>
                  <p class="text-gray-700 uppercase mt-2">
                    {{__($a_post->category)}}
                  </p>
                </div>
                <br>
                
              </div>
            </div>
          @endforeach
        </div>
        
        <div class="flex mt-8  px-4 lg:px-0 items-center justify-between">
          <h2 class="font-bold text-3xl">Technology news</h2>
          <a href="{{route('blog.posts')}}" class="py-1 px-3 text-md font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-1 border-gray-900 rounded hover:bg-gray-800 cursor-pointer">
            View all
          </a>
        </div>
        <div class="grid lg:grid-cols-4 sm:grid-cols-1 md:grid-cols-2 pt-24 space-x-0 lg:flex lg:space-x-6">
          @foreach ($technologyPosts as $t_post)
            <div class="rounded  w-full lg:w-1/2 lg:w-1/3  lg:p-0">
              
                @php
                    $t_img = $t_post->image;
                @endphp
                <div class="lg:h-2/5 w-full">
                  <a href="{{route('blog.post', ['id'=>$t_post->id])}}" class=" rounded cursor-pointer">
                    <img src="{{asset('/storage/'.$t_img->n_Img)}}" class="rounded w-full" alt="technology" />
                  </a>
                </div>
                <div class=" rounded hover:bg-gray-200 mt-12 grid rows grid-flow-row md:auto-rows-min w-full">
                <hr>
                <br>
                <div>
                  <a href="{{route('blog.post', ['id'=>$t_post->id])}}">
                    <h2 class="font-bold text-2xl text-gray-800 hover:text-purple-500">{{$t_post->tittle}}</h2>
                  </a>
                </div>
                <div>
                  <p class="text-gray-700 uppercase mt-2">
                    {{__($t_post->category)}}
                  </p>
                </div>
                <br>
                
              </div>
            </div>
          @endforeach
        </div>
    </div>
  
  </div>
  
  
  
@endsection