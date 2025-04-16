.php
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
                        primary: '#CD3F37',
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .btn-primary {
                @apply bg-primary text-white py-2 px-6 rounded-md hover:bg-red-700 transition;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="font-sans min-h-screen bg-white flex flex-col">
    <!-- Check if current route is login or register -->
    @php
        $isAuthPage = in_array(request()->route()->getName(), ['login', 'register']);
    @endphp

    <!-- Header - Hide on auth pages -->
    @unless($isAuthPage)
    <header class="bg-white shadow-sm z-30 relative">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-primary">GetOurThrift</span>
                </a>

                <nav>
                    <ul class="flex space-x-6">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-primary">Home</a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-600 hover:text-primary">Shop</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-primary">About</a></li>
                        <li><a href="{{ route('location') }}" class="text-gray-600 hover:text-primary">Location</a></li>

                        @auth
                            <li class="relative group">
                                <button class="text-gray-600 hover:text-primary flex items-center">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block z-50">
                                    @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Dashboard
                                    </a>
                                    <a href="{{ route('admin.inbox') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Orders Inbox
                                    </a>
                                    <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Products
                                    </a>
                                    <div class="border-t border-gray-100"></div>
                                    @else
                                    <a href="{{ route('history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Order History
                                    </a>
                                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Profile
                                    </a>
                                    @endif
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-primary">Login</a></li>
                            <li><a href="{{ route('register') }}" class="bg-primary text-white px-4 py-1 rounded hover:bg-red-700">Register</a></li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    @endunless

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer - Hide on auth pages -->
    @unless($isAuthPage)
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">GetOurThrift</h3>
                    <p class="mb-4 text-gray-400">Your destination for quality thrift fashion at affordable prices.</p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-white">Shop</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="{{ route('location') }}" class="text-gray-400 hover:text-white">Location</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Jakarta, Indonesia</li>
                        <li>+62 812-3456-7890</li>
                        <li>info@getourthrift.com</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400">&copy; 2025 GetOurThrift. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.148-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    @endunless

    @stack('scripts')
</body>
</html>
