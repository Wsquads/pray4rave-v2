<!-- This is an example component -->
@extends('welcome')
@section('content')
    

<div class="min-h-screen min-w-screen bg-gray-100 flex items-center justify-center pt-16">
    <div class="flex flex-col max-w-3xl bg-white px-8 py-6 rounded-xl space-y-5 ">
        <h3 class="font-bold uppercase text-3xl text-center text-gray-900 text-xl">{{$album_id->tittle}}</h3>
        <hr>
        <div class="max-w-xl mx-auto">
            <img class="w-full rounded-md" src="{{asset('images')}}/{{$album_id->image->n_Img}}" alt="motivation" />
        </div>
        <div>
            <h1 class="mb-4  mt-4 uppercase text-xl font-bold">Description</h1>
            <p class=" leading-relaxed pl-2">
                {!! nl2br($album_id->description) !!}
            </p>
        </div>
        <hr>
        <h1 class="mb-4 text-center uppercase text-2xl font-bold">Playlist</h1>
        <hr>

        <div class="flex flex-col">
            {!! $album_id->soundcloud !!}
        </div>
        <hr>

        <h1 class="mb-4 text-center uppercase text-2xl font-bold">Tunes</h1>
        <hr>
        <div class="flex flex-col-2">
            @foreach ($album_id->release as $item)
                <div class="px-4">
                    <h3 class="uppercase mb-2 text-md font-semibold">{{$item->tittle}}</h3>
                    {!! $item->soundcloud !!}

                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection