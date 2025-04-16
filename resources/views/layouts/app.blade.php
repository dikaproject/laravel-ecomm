<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GetOurThrift')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#8B1D24',
                        secondary: '#F5F5F5',
                    },
                    fontFamily: {
                        serif: ['Times New Roman', 'serif'],
                    }
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .btn-primary {
                @apply bg-primary text-white font-medium py-2 px-6 rounded-md hover:bg-red-800 transition duration-300;
            }
            .nav-link {
                @apply px-4 py-2 font-medium hover:text-primary transition duration-300;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="font-sans min-h-screen bg-white">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-serif font-bold text-primary">GETOURTHRIFT</a>
                
                <nav class="hidden md:flex space-x-2">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-primary' : 'text-gray-700' }}">Home</a>
                    <a href="{{ route('shop') }}" class="nav-link {{ request()->routeIs('shop') ? 'text-primary' : 'text-gray-700' }}">Shop</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-primary' : 'text-gray-700' }}">About</a>
                    <a href="{{ route('location') }}" class="nav-link {{ request()->routeIs('location') ? 'text-primary' : 'text-gray-700' }}">Location</a>
                    
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-gray-700' }}">Dashboard</a>
                            <a href="{{ route('admin.inbox') }}" class="nav-link {{ request()->routeIs('admin.inbox') ? 'text-primary' : 'text-gray-700' }}">Orders</a>
                        @else
                            <a href="{{ route('history') }}" class="nav-link {{ request()->routeIs('history') ? 'text-primary' : 'text-gray-700' }}">History</a>
                        @endif
                    @endauth
                </nav>
                
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('profile') }}" class="text-gray-700 hover:text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-primary mb-4">Get On the List!</h3>
                <p class="text-sm text-gray-600 mb-4">Sign Up with your email address to receive updates</p>
                
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" placeholder="Your email..." class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" required>
                    <button type="submit" class="px-6 py-2 bg-primary text-white rounded-md hover:bg-red-800 transition">Subscribe</button>
                </form>
            </div>
            
            <div class="flex justify-center space-x-4 my-6">
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
            
            <div class="text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} GetOurThrift. All rights reserved.
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>