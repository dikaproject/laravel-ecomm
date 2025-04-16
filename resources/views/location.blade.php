@extends('layouts.app')

@section('title', 'Our Location - GetOurThrift')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl md:text-5xl font-serif text-primary text-center mb-12">Visit Our Store</h1>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-10">
            <!-- Map Container -->
            <div class="h-96 w-full bg-gray-200">
                <!-- Replace with your actual map embed code -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0527017144933!2d106.82527927468936!3d-6.259988993753851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f17f256abbb7%3A0x3c276398aad8867!2sJl.%20Wolter%20Monginsidi%20No.63%2C%20RT.1%2FRW.5%2C%20Melawai%2C%20Kec.%20Kby.%20Baru%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012160!5e0!3m2!1sen!2sid!4v1681625841348!5m2!1sen!2sid"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="p-8">
                <h2 class="text-2xl font-bold mb-4">GetOurThrift Store</h2>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <h3 class="font-semibold">Address</h3>
                            <p class="text-gray-600">Jl. Wolter Monginsidi No.63, RT.1/RW.5, Melawai, Kec. Kby. Baru, Jakarta Selatan, DKI Jakarta 12160</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h3 class="font-semibold">Opening Hours</h3>
                            <p class="text-gray-600">Monday - Saturday: 10:00 AM - 9:00 PM</p>
                            <p class="text-gray-600">Sunday: 11:00 AM - 6:00 PM</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div>
                            <h3 class="font-semibold">Contact</h3>
                            <p class="text-gray-600">Phone: +62 812-3456-7890</p>
                            <p class="text-gray-600">Email: info@getourthrift.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
