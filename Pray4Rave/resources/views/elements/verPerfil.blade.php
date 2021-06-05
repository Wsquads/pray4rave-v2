@extends('welcome')
@section('content')
<div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden mt-32 mb-8 mx-auto">
    @auth
        @if (isset($user_id->image->n_Img))
            <img class="w-full h-56 object-cover object-center" src="{{asset('images')}}/{{$user_id->image->n_Img}}" alt="avatar">
        @else
            <img class="w-full h-56 object-cover object-center" src="{{asset('/img/kobihome.jpg')}}" alt="avatar">
        @endif
    <div class="py-4 px-6">
        <h1 class="text-2xl font-semibold text-center text-gray-800 my-8">{{$user_id->name}}</h1>
        <div class="flex flex-col-2 items-center justify-center">
            <div class="m-1 pt-1 transform hover:text-purple-500 hover:scale-110">
                <a class="shadow bg-purple-400 rounded  text-gray-100 p-2" href="{{route('manageUsers.editar', ['id'=> $user_id->id])}}">Editar</a>
            </div>
            <div class=" m-1 shadow transform hover:text-purple-500 hover:scale-110">
                <form action="{{route('manageUsers.delete', ['id'=> $user_id->id])}}" method="POST">
                    @csrf
                    <button type="submit" class="shadow bg-red-400 text-gray-100 rounded p-2">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
        
    </div>
    @endauth
</div>
    
@endsection
