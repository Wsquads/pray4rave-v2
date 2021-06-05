@extends('welcome')
@section('content')
    
<form  method="post" action="{{ route('manageReleases.saveAlbum') }}" enctype="multipart/form-data"  class="pt-14">
    @csrf
    
    <div>
      <div class="flex h-screen bg-gray-200 items-center pt-10 justify-center ">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
            <div class="flex justify-center py-4">
              <div class="flex  rounded-full md:p-4 p-2 ">
                  <img class="w-44" src="{{asset('/img/logo.png')}}" alt="">
              </div>
            </div> 
        
            <div class="flex justify-center">
  
              <div class="flex">
  
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Upload an Album</h1>
                
              </div>
             
            </div>
            @if(session()->has('success'))
                <div class="flex justify-center">
                  {{ session()->get('success') }}
                </div>
            @endif
        
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">tittle</label>
              <input  name="tittle" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="tittle" />
              <!-- Error -->
              @if ($errors->has('tittle'))
                <div class="error">
                  {{ $errors->first('tittle') }}
                </div>
              @endif
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

  <div class="overflow-x-auto">
    <div class="min-w-screen min-h-screen  flex items-center justify-center  font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <h1 class="w-full text-center text-2xl font-semibold">Manage Releases</h1>
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">id</th>
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-center">Date</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($albums as $item)
                            
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                   
                                    <span class="font-medium">{{$item->id}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                  <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="{{asset('images')}}/{{$item->image->n_Img}}"/>
                                </div>
                                    <span>{{$item->tittle}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="">
                                    <span>{{$item->created_at}}</span>
                                  
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="m-1 pt-2  transform hover:text-purple-500 hover:scale-110">
                                        <a class="shadow bg-purple-400 rounded  text-gray-100 p-2" href="{{route('manageReleases.editarRelease', ['id'=> $item->id])}}">Editar</a>
                                    </div>
                                    <div class=" m-1 shadow transform hover:text-purple-500 hover:scale-110">
                                        <form action="{{route('manageReleases.deleteRelease', ['id'=> $item->id])}}" method="POST">
                                            @csrf
                                            <button type="submit" class="shadow bg-red-400 text-gray-100 rounded p-2">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                    
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{$albums->links()}}
        </div>
    </div>
</div>
  
  <form  method="post" action="{{ route('manageReleases.saveRelease') }}" enctype="multipart/form-data"  class="py-16">
    @csrf
    
    <div>
      <div class="flex h-screen bg-gray-200 items-center justify-center mb-32">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
            <div class="flex justify-center py-4">
              <div class="flex  rounded-full md:p-4 p-2 ">
                  <img class="w-44" src="{{asset('/img/logo.png')}}" alt="">
              </div>
            </div> 
        
            <div class="flex justify-center">
  
              <div class="flex">
  
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Upload a Release</h1>
                
              </div>
             
            </div>
            @if(session()->has('success'))
                <div class="flex justify-center">
                  {{ session()->get('success') }}
                </div>
            @endif
            <div class="grid grid-cols-1 px-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">ALBUM</label>
              <select name="album" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                @foreach ($albums as $item)
                  <option value="{{$item->id}}">{{$item->tittle}}</option>
                @endforeach
              </select>
              @if ($errors->has('album'))
                <div class="error">
                  {{ $errors->first('album') }}
                </div> 
              @endif
            </div>
            <div class="grid grid-cols-1 px-7 py-10">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold pb-4">category</label>
              <label><input name="category1"type="checkbox" id="cbox1" value="liquid-Funk"> Liquid-Funk</label><br>
              <label><input name="category2" type="checkbox" id="cbox1" value="deep"> Deep</label><br>
              <label><input name="category3" type="checkbox" id="cbox1" value="techstep"> Techstep</label><br>
              <label><input type="checkbox" name="category4" id="cbox1" value="rollers"> Rollers</label><br>
              <label><input type="checkbox" name="category5" id="cbox1" value="half-time"> Half-time</label><br>
              <label><input type="checkbox" name="category6" id="cbox1" value="liquid-Funk"> Liquid-Funk</label><br>

              @if ($errors->has('album'))
                <div class="error">
                  {{ $errors->first('album') }}
                </div> 
              @endif
            </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">tittle</label>
              <input  name="tittle" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="tittle" />
              <!-- Error -->
              @if ($errors->has('tittle'))
                <div class="error">
                  {{ $errors->first('tittle') }}
                </div>
              @endif
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
                    
        
            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-8 pb-5'>
              <button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' >Create</button>
            </div>
        
          </div>
          
        </div>
  </div>
  </form>
  <div class="overflow-x-auto">
    <div class="min-w-screen min-h-screen  flex items-center justify-center  font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <h1 class="w-full text-center text-2xl font-semibold">Manage Releases</h1>
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">id</th>
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-center">Date</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($releases as $item)
                            
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                   
                                    <span class="font-medium">{{$item->id}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                  <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="{{asset('images')}}/{{$item->album->image->n_Img}}"/>
                                </div>
                                    <span>{{$item->tittle}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="">
                                    <span>{{$item->created_at}}</span>
                                  
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="m-1 pt-2  transform hover:text-purple-500 hover:scale-110">
                                        <a class="shadow bg-purple-400 rounded  text-gray-100 p-2" href="{{route('manageReleases.editarRelease', ['id'=> $item->id])}}">Editar</a>
                                    </div>
                                    <div class=" m-1 shadow transform hover:text-purple-500 hover:scale-110">
                                        <form action="{{route('manageReleases.deleteRelease', ['id'=> $item->id])}}" method="POST">
                                            @csrf
                                            <button type="submit" class="shadow bg-red-400 text-gray-100 rounded p-2">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                    
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{$releases->links()}}
        </div>
    </div>
</div>
@endsection