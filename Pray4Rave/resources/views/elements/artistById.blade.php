@extends('welcome')
@section('content')
<div class="container px-6 py-10 mx-auto md:py-16">
    <div class="flex flex-col space-y-6 md:flex-row md:items-center md:space-x-6">
        <div class="w-full md:w-1/2">
            <div class="max-w-lg">
                <h1 class="text-2xl font-medium tracking-wide text-gray-800 md:text-4xl">
                    Find your premium new car exported from Germany
                </h1>
                <p class="mt-2 text-gray-600">
                    We work with the best remunated car dealers in Germany to find
                    your new car.
                </p>
                <div class="grid gap-6 mt-8 sm:grid-cols-2">
                    <div class="flex items-center space-x-6 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Premium selection</span>
                    </div>
                    <div class="flex items-center space-x-6 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Insurance</span>
                    </div>
                    <div class="flex items-center space-x-6 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>All legal documents</span>
                    </div>
                    <div class="flex items-center space-x-6 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>From German car dealers</span>
                    </div>
                    <div class="flex items-center space-x-6 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Payment Security</span>
                    </div>
                    <div class="flex items-center space-x-6 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Fast shipping (+ Express)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center w-full md:w-1/2">
            <img src="{{asset('/storage/'.$artistById->image->n_Img)}}"
                alt="car photo" class="w-full h-full max-w-2xl rounded" />
        </div>
    </div>
</div>
@endsection