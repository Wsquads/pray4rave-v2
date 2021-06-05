@extends('welcome')
@section('content')
<div class="container px-6 py-10 mx-auto md:py-16">
    <div class="lg:float-right lg:max-w-sm my-10 pt-8 items-center justify-center">
        <div class="">
            <img src="{{asset('images')}}/{{$artistById->image->n_Img}}"
                alt="Artist Photo" class="w-full  rounded" />
        </div>
        <div class="grid  mt-8 sm:grid-cols-2">
            <div class="flex items-center  text-gray-800">
                <a href="{{$artistById->l_instagram}}"  target="_blank" rel="noopener noreferrer">
                    <h3 class="text-md font-semibold uppercase">Instagram link</h3>
                </a>
                <a href="{{$artistById->l_instagram}}" class="max-w-sm mx-4" target="_blank" rel="noopener noreferrer"><img src="{{asset('img/instagram.png')}}" class="w-12 bg-purple-400 rounded-full" alt=""></a>
            </div>
            <div class="flex items-center  text-gray-800">
                <a href="{{$artistById->l_soundcloud}}"  target="_blank" rel="noopener noreferrer">
                    <h3 class="text-md font-semibold uppercase">Soundcloud link</h3>
                </a>
                <a href="{{$artistById->l_soundcloud}}" class="max-w-sm mx-4" target="_blank" rel="noopener noreferrer"><img src="{{asset('img/logotipo-de-soundcloud.png')}}" class="w-12 bg-purple-400 rounded-full" alt=""></a>
            </div>
        </div>
    </div>
    <div>
        <div class="w-full mt-16 lg:w-1/2">
            <div class="w-full">
                <h1 class="text-2xl font-medium uppercase tracking-wide text-gray-800 md:text-4xl">
                    {{$artistById->nick}}
                </h1>
                <p class="mt-4 text-gray-600">
                    {!! nl2br($artistById->description) !!}
                </p>
                <div class="mt-8 py-4">
                    <h1 class="text-2xl mb-8 font-semibold uppercase tracking-wide text-gray-800 ">
                        Soundcloud Releases
                    </h1>
                    <div class="text-gray-800">
                        {!!$artistById->soundcloud!!}
                    </div>
                </div>
                
                
            </div>
        </div>
        
        
    </div>
</div>
@endsection