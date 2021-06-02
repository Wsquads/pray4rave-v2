@extends('welcome')
@section('content')
    <section class="bg-gray-100">
        <h2 class="text-3xl text-center font-bold pt-24 text-gray-800">Our Artists</h2>
        <p class="max-w-4xl mx-auto text-lg mt-8 text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
        </p>
        <div class="w-4/5 px-6 py-16 mx-auto text-center">
    
            <div class="grid gap-8 mt-6 sm:grid-cols-1 md:grid-cols-2">
            @foreach ($artists as $item)
            @php
                $soundcloud = trim($item->soundcloud);
            @endphp
                    <div 
                    data-aos='zoom-out-right'
                    data-aos-duration="400"
                        >
                        <a href="{{route('artists.artist', ['id'=>$item->id])}}">
                            <img class="object-cover object-center w-full h-72 rounded-md shadow"
                                src="{{asset('/storage/'.$item->image->n_Img)}}">
                        </a>
                        <h3 class="mt-2 font-medium text-gray-700"><a href="{{route('artists.artist', ['id'=>$item->id])}}">{{$item->nick}}</a></h3>
                        <p class="text-sm text-gray-600">{{$item->birthdate}}</p>
                    </div>
            @endforeach
            </div>
        </div>
    </section>
@endsection