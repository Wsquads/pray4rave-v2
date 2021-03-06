<!-- This is an example component -->
@extends('welcome')
@section('content')
    
<div class="">
    <div class='flex max-w-3xl my-20 bg-white  shadow-md rounded-lg overflow-hidden mx-auto'>
        <div class='flex items-center w-full'>
            <div class='w-full'>
                <div class="flex flex-row mt-2 px-2 py-3 mx-3">
                    <div class="flex flex-col ml-4 mt-2">
                        <div class='text-gray-900 uppercase text-2xl font-semibold'><h2>{{$post_id->tittle}}</h2></div>
                    </div>
                    @auth
                        @if(Auth::user()->is_admin == 1)
                        <div class="relative lg:ml-24 pl-4 pt-2" x-data="{ isOpen: false}">
                            <button 
                                    @click="isOpen = !isOpen" 
                                    @keydown.escape="isOpen = false" 
                                    class="flex items-center" 
                            >
                                <img src="{{asset('/img/editar.png')}}" alt="avatar" class="w-8 h-8 rounded">
                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path></svg>
                            </button>
                            <ul x-show="isOpen"
                                @click.away="isOpen = false"
                                class="absolute font-normal bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 right-0 z-20"
                            >
                                <li class="flex justify-center border-gray-400">
                                    
                                    <a href="{{route('posts.editar', ['id'=> $post_id->id])}}" class="flex items-center  px-3 py-3">
                                        <span class=" shadow bg-purple-400 text-gray-100 rounded py-2 px-3">Edit</span>
                                    </a>
                                </li>
                                <li class="flex justify-center border-b border-gray-400">
                                    <form action="{{route('posts.delete', ['id'=> $post_id->id])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="shadow bg-red-400 text-gray-100 rounded p-2">
                                            Eliminar
                                        </button>
                                    </form>
                                </li>
                                
                            </ul>
                        </div>
                        @endif    
                    @endauth
                </div>
                
                <div class="border-b border-gray-100"></div> 
                <div class='text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2'><img class="rounded" src="{{asset('images')}}/{{$post_id->image->n_Img}}"></div>
                
                <div>
                    <div class='text-gray-700 font-semibold text-xl mb-2 mx-3 px-2'><h1>Description</h1></div>
                    <div class='text-gray-500 font-thin text-sm mb-6 mx-3 px-2'>{!! nl2br($post_id->description) !!}</div>
                </div>
                <div class="flex justify-start mb-4 border-t border-gray-100">
                    <div class="flex justify-start w-full mt-1 pt-2 pl-5">
                        <span class="transition ease-out duration-300  py-1 h-8 px-2  text-center rounded text-gray-400  mr-2">
                            {{$post_id->created_at->format('j F, Y')}}
                        </span>
                        
                    </div>
                    
                    <div class="flex justify-end w-full mt-1 pt-2 pr-4">
                        
                        <a href="{{$post_id->link}}"target="blank">
                            <span class="transition ease-out duration-300 hover:text-gray-700 py-1 hover:bg-gray-200 bg-purple-500 h-8 px-2  text-center rounded-full text-gray-100  mr-2">
                                Buy now
                        </a>
                        <a href="{{$post_id->link}}" target="blank">
                            <svg class="w-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 450.391 450.391" style="enable-background:new 0 0 450.391 450.391;" xml:space="preserve">
                       <g>
                           <g>
                               <g>
                                   <path d="M143.673,350.322c-25.969,0-47.02,21.052-47.02,47.02c0,25.969,21.052,47.02,47.02,47.02
                                       c25.969,0,47.02-21.052,47.02-47.02C190.694,371.374,169.642,350.322,143.673,350.322z M143.673,423.465
                                       c-14.427,0-26.122-11.695-26.122-26.122c0-14.427,11.695-26.122,26.122-26.122c14.427,0,26.122,11.695,26.122,26.122
                                       C169.796,411.77,158.1,423.465,143.673,423.465z"/>
                                   <path d="M342.204,350.322c-25.969,0-47.02,21.052-47.02,47.02c0,25.969,21.052,47.02,47.02,47.02s47.02-21.052,47.02-47.02
                                       C389.224,371.374,368.173,350.322,342.204,350.322z M342.204,423.465c-14.427,0-26.122-11.695-26.122-26.122
                                       c0-14.427,11.695-26.122,26.122-26.122s26.122,11.695,26.122,26.122C368.327,411.77,356.631,423.465,342.204,423.465z"/>
                                   <path d="M448.261,76.037c-2.176-2.377-5.153-3.865-8.359-4.18L99.788,67.155L90.384,38.42
                                       C83.759,19.211,65.771,6.243,45.453,6.028H10.449C4.678,6.028,0,10.706,0,16.477s4.678,10.449,10.449,10.449h35.004
                                       c11.361,0.251,21.365,7.546,25.078,18.286l66.351,200.098l-5.224,12.016c-5.827,15.026-4.077,31.938,4.702,45.453
                                       c8.695,13.274,23.323,21.466,39.184,21.943h203.233c5.771,0,10.449-4.678,10.449-10.449c0-5.771-4.678-10.449-10.449-10.449
                                       H175.543c-8.957-0.224-17.202-4.936-21.943-12.539c-4.688-7.51-5.651-16.762-2.612-25.078l4.18-9.404l219.951-22.988
                                       c24.16-2.661,44.034-20.233,49.633-43.886l25.078-105.012C450.96,81.893,450.36,78.492,448.261,76.037z M404.376,185.228
                                       c-3.392,15.226-16.319,26.457-31.869,27.69l-217.339,22.465L106.58,88.053l320.261,4.702L404.376,185.228z"/>
                               </g>
                           </g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       </svg>
                        </span>
                        </div>
                        </a>
                        
                </div>
                
                
                <div class="flex w-full border-t border-gray-100">
                    <div class="mt-3 mx-5 flex flex-row">
                        <div class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>Comments:<div class="ml-1 text-gray-400 font-thin text-ms">{{count($post_id->coments)}}</div></div>
                    </div>
                   
                </div>
                <form action="{{route('comments.create',['id'=>$post_id->id])}}" method="POST">
                    @csrf
                    <div class="relative flex items-center self-center w-full w-full p-4 overflow-hidden text-gray-600 focus-within:text-gray-400">
                        <img class='w-10 h-10 object-cover rounded  mr-2 cursor-pointer' alt='User avatar' src='{{asset('/img/usuario.ico')}}'>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-6">
                            <button type="submit" class="p-1 m-1 focus:outline-none focus:shadow-none hover:text-blue-500">
                            Send
                            </button>
                        </span>
                        <input type="text" name="description" class="w-full py-2 pl-4 pr-10 text-sm bg-gray-100 border border-transparent appearance-none rounded-tg placeholder-gray-400 focus:bg-white focus:outline-none focus:border-blue-500 focus:text-gray-900 focus:shadow-outline-blue" style="border-radius: 25px" placeholder="Post a comment..." autocomplete="off">
                    </div>
                </form>
                @php
                @endphp
                @foreach ($comments as $comment)
                    @auth
                        @if (Auth::user()->id == $comment->user_id)
                            <div class="bg-white rounded-lg p-3  flex flex-col justify-center  shadow mx-4 rounded mb-4">
                                <div class="flex flex-row justify-end mr-2">
                                    <h3 class="text-purple-600 font-semibold text-lg mr-2 ">{{$comment->user->name}}</h3>
                                    @if (isset($comment->user->image->n_Img))
                                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="{{asset('images')}}/{{$comment->user->image->n_Img}}">
                                        
                                    @else
                                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="{{asset('/img/usuario.ico')}}">
                                        
                                    @endif  
                                </div>
                                <p  class="ml-14 flex flex-row justify-end p-4  shadow border-purple-400 rounded text-gray-600 text-lg  md:text-right">
                                    {!! nl2br($comment->description) !!}

                                    
                                </p>
                            </div>
                        @else
                            <div class="bg-white rounded-lg p-3  flex flex-col justify-center  shadow mx-4 rounded mb-4">
                                <div class="flex flex-row justify-start mr-2">
                                    @if (isset($comment->user->image->n_Img))
                                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="{{asset('images')}}/{{$comment->user->image->n_Img}}">
                                        
                                    @else
                                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="{{asset('/img/usuario.ico')}}">
                                        
                                    @endif
                                <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{$comment->user->name}}</h3>
                                </div>
                            
                            
                                <p class="ml-14 flex flex-row justify-start p-4  shadow border-purple-400 rounded text-gray-600 text-lg  md:text-left ">
                                    {!! nl2br($comment->description) !!}

                                </p>
                            
                            </div>
                            
                        @endif
                        
                    @endauth
                @endforeach
            
            </div>
            
        </div>
    </div>
    </div>
@endsection