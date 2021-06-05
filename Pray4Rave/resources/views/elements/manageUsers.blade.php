
@extends('welcome')
@section('content')
    

<div class="overflow-x-auto">
    <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">id</th>
                            <th class="py-3 px-6 text-left">name</th>
                            <th class="py-3 px-6 text-center">email</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($users as $item)
                            
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                   
                                    <span class="font-medium">{{$item->id}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @if (isset($item->image->n_Img))
                                        
                                    <div class="mr-2">
                                        <img class="w-6 h-6 rounded-full" src="{{asset('images')}}/{{$item->image->n_Img}}"/>
                                    </div>
                                    @endif
                                    <span>{{$item->name}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="">
                                    <span>{{$item->email}}</span>
                                  
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    
                                    <div class="m-1 pt-2  transform hover:text-purple-500 hover:scale-110">
                                        <a class="shadow bg-purple-400 rounded  text-gray-100 p-2" href="{{route('manageUsers.editar', ['id'=> $item->id])}}">Editar</a>
                                    </div>
                                    <div class=" m-1 shadow transform hover:text-purple-500 hover:scale-110">
                                        <form action="{{route('manageUsers.delete', ['id'=> $item->id])}}" method="POST">
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
            {{$users->links()}}
        </div>
    </div>
</div>
    
@endsection

