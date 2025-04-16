@extends('layouts.app')

@section('title', 'GetOurThrift - Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <div class="flex flex-col md:flex-row">
            <!-- Left Section with Logo Overlay -->
            <div class="w-full md:w-1/2 bg-white relative py-8 md:py-16">
                <div class="absolute inset-0 flex items-center justify-center z-10">
                    <div class="text-primary font-serif font-bold text-5xl md:text-7xl transform -rotate-90 md:translate-x-20">
                        GETOURTHRIFT
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 w-full p-4 md:p-8 z-20">
                    <img src="{{ asset('images/model-casual.jpg') }}" alt="Fashion Model" class="w-full h-auto object-cover shadow-lg">
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
                            <div class="bg-white/20 rounded-lg p-4">
                                <img src="{{ asset('images/products/batik-pink.jpg') }}" alt="Featured Product" class="w-full h-auto rounded">
                                <div class="mt-4 flex justify-end">
                                    <a href="{{ route('shop.product', 1) }}" class="bg-primary text-white px-6 py-2 rounded hover:bg-red-900 transition">GET IT</a>
                                </div>
                            </div>
                            
                            <!-- Carousel Controls -->
                            <div class="flex justify-between mt-4">
                                <button class="text-white/80 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button class="text-white/80 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

    <!-- Newsletter Section -->
    <section class="bg-primary text-white py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-xl mx-auto">
                <h3 class="text-xl font-semibold mb-2">Get On the List!</h3>
                <p class="text-sm text-white/80 mb-4">Sign Up with your email address to receive updates</p>
                
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" placeholder="Your email..." class="px-4 py-2 border border-white/20 bg-white/10 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-white" required>
                    <button type="submit" class="px-6 py-2 bg-white text-primary font-medium rounded-md hover:bg-gray-100 transition">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Social Media -->
    <section class="py-4 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-center space-x-4">
                <a href="#" class="text-gray-700 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-700 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-700 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection