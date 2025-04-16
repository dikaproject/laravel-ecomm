@extends('layouts.app')

@section('title', 'About Us - GetOurThrift')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl md:text-5xl font-serif text-primary text-center mb-12">About Us</h1>
    
    <div class="max-w-3xl mx-auto">
        <div class="mb-10">
            <img src="{{ asset('images/about-store.jpg') }}" alt="Our Store" class="w-full h-auto rounded-lg shadow-lg mb-6">
            
            <h2 class="text-2xl font-bold mb-4">Our Story</h2>
            <p class="text-gray-700 mb-4">
                GetOurThrift started in 2023 as a small passion project by a group of fashion enthusiasts who believed in sustainable fashion. 
                We wanted to create a platform where quality second-hand clothing could find new homes and reduce the fashion industry's environmental footprint.
            </p>
            <p class="text-gray-700">
                Today, we curate high-quality thrifted items from various sources, ensuring each piece meets our standards of quality and style. 
                Our mission is to make sustainable fashion accessible, affordable, and trendy.
            </p>
        </div>
        
        <div class="mb-10">
            <h2 class="text-2xl font-bold mb-4">Our Mission</h2>
            <p class="text-gray-700">
                We believe in giving clothes a second life and reducing waste in the fashion industry. Every item you purchase from us is one less item in a landfill and one more step toward sustainable consumption habits.
            </p>
        </div>
        
        <div class="mb-10">
            <h2 class="text-2xl font-bold mb-4">Quality Assurance</h2>
            <p class="text-gray-700">
                Each item in our collection is carefully selected, cleaned, and inspected to ensure it meets our high standards. We only sell items that we would be proud to wear ourselves.
            </p>
        </div>
    </div>
</div>
@endsection