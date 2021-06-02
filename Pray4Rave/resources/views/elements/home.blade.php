@extends('welcome')
@section('content')
<div class="my-1 w-full">
    <div class="w-full">
        <section class="items-center justify-center" data-aos="fade-in" data-aos-duration="900" >
            <div class="items-center kobainOp pt-12">
                <p class="m-4"><img class=" w-64 mx-auto" src="{{asset('/img/logo.png')}}" alt=""></p>
                <h2 class="mt-4 w-3/4 text-center mx-auto text-3xl font-bold text-black md:text-5xl">Check Out our new releases clicking here</h2>
                <div class="flex justify-center mt-8 pb-8">
                    <a class=" py-4 px-6 text-lg font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-1 border-gray-900 rounded hover:bg-gray-800"
                    href="{{route('releases.releases')}}">Releases</a>
                </div>
            </div>
        </section>
        
        
        <section class="bg-gray-100 ">
            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="items-center md:flex md:space-x-6">
                    <div class="md:w-1/2" data-aos="fade-left" data-aos-duration="500">
                        <h3 class="text-2xl font-bold text-gray-800"><a href="">Events</a></h3>
                        <p class="max-w-md mt-4 mb-8 text-gray-600">In Pray4rave we hardly work on giving you the most recent DNB from all accross the world mixed with our favorite tunes, with the objetive of making you to feel mind-full and enjoy the sessions.</p>
                        <a class=" py-4 px-6 text-md font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-1 border-gray-900 rounded hover:bg-gray-800"
                        href="#">Check</a>
                    </div>
        
                    <div class="mt-8 md:mt-0 md:w-1/2" data-aos="fade-right" data-aos-duration="800">
                        <div class="flex items-center justify-center">
                            <div class="max-w-md">
                                <a href=""><img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                    src="{{asset('/img/ratasiendoorata.jpeg')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="bg-gray-100">
            <div class="max-w-5xl px-6 py-16 mx-auto ">
                <div class="items-center md:flex md:space-x-6">
                    <div class="md:w-1/2">
                        <div class="flex items-center justify-center">
                            <div class="max-w-md ">
                                <img class="object-cover object-center w-full rounded-md shadow" style="height: 300px;"
                                    src="{{asset('/img/Adam_A3X.jpg')}}">
                            </div>
                        </div>
                    </div>
        
                    <div class="mt-8 md:mt-0 md:w-1/2">
                        <a href=""><h3 class="text-2xl font-semibold text-gray-800">Blog</h3></a> 
                        <p class="max-w-md mt-4 mb-8 text-gray-600">Check Out our Audio and mixing reviews so you can learn about mixing or producing, build your songs or sessions with the same prooducts we use or we had used once.</p>
                        <a class=" py-4 px-6 text-md font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-1 border-gray-900 rounded hover:bg-gray-800"
                        href="#">Check</a>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="bg-white">
            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="px-8 py-12 bg-gray-800 rounded-md md:px-20 md:flex md:items-center md:justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold text-white">Lorem ipsum dolor sit amet</h3>
                        <p class="max-w-md mt-4 text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing Ac aliquam ac
                            volutpat, viverra magna risus aliquam massa.</p>
                    </div>
        
                    <a class=" py-4 px-6 text-md font-medium text-center bg-purple-500 text-gray-100 transition-colors duration-300 transform border-doble border-2 border-gray-100 rounded hover:bg-purple-600"
                        href="#">Get in touch</a>
                </div>
            </div>
        </section>
    </div>

</div>

@endsection
