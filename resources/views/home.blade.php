@extends('layouts.app')

@section('title', 'GetOurThrift - Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <div class="flex flex-col md:flex-row">
            <!-- Left Section with Logo Overlay -->
            <div class="w-full md:w-1/2 bg-white relative py-8 md:py-16">
                
                <!-- Fashion Model Image with Background Text -->
                <div class="absolute bottom-0 left-0 w-full p-4 md:p-8 z-20">
                    <div class="relative">
                        <!-- Background text that shows through transparent parts -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-gray-200 font-bold text-8xl md:text-9xl opacity-80 tracking-widest">
                                THRIFT
                            </span>
                            <span class="text-gray-200 font-bold text-5xl md:text-6xl opacity-60 tracking-wider mt-4">
                                STYLE
                            </span>
                        </div>
                        <!-- Model image with transparent background -->
                        <img src="{{ asset('image/model.png') }}" alt="Fashion Model" class="w-full h-auto object-contain relative z-10">
                    </div>
                </div>
            </div>
            
            <!-- Right Section with Banner -->
            <div class="w-full md:w-1/2 bg-primary text-white relative">
                <div class="h-full flex flex-col justify-center p-8 md:p-16">
                    <div class="mt-64 md:mt-0">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4">LOOK FOR YOUR</h1>
                        <h2 class="text-5xl md:text-7xl font-serif mb-6">TREASURE</h2>
                        
                        <p class="text-white/80 mb-8">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                            veniam,
                        </p>
                        
                        <!-- Product Carousel -->
                        <div class="relative mt-12">
                            <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4 hover:bg-white/30 transition duration-300">
                                <img src="{{ asset('images/products/batik-pink.jpg') }}" alt="Featured Product" class="w-full h-auto rounded">
                                <div class="mt-4 flex justify-between items-center">
                                    <div>
                                        <h3 class="text-xl font-semibold">Batik Pink</h3>
                                        <p class="text-sm text-white/80">Exclusive Collection</p>
                                    </div>
                                    <a href="{{ route('shop.product', 1) }}" class="bg-white text-primary px-6 py-2 rounded hover:bg-gray-100 transition flex items-center">
                                        GET IT
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Carousel Controls -->
                            <div class="flex justify-between mt-4">
                                <button class="text-white/80 hover:text-white bg-white/10 p-2 rounded-full hover:bg-white/20 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <div class="flex space-x-2 items-center">
                                    <span class="h-2 w-6 bg-white rounded-full"></span>
                                    <span class="h-2 w-2 bg-white/40 rounded-full"></span>
                                    <span class="h-2 w-2 bg-white/40 rounded-full"></span>
                                </div>
                                <button class="text-white/80 hover:text-white bg-white/10 p-2 rounded-full hover:bg-white/20 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection