@extends('layouts.app')

@section('title', 'Optic Clubs - Home')

@section('content')
    @vite('resources/css/styles.css')


    <style>
        #bannerdi {
            background: linear-gradient(rgba(0,0,0,0.5), #128b9e94), url('{{ asset('images/home back.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
    </style>

    <section id="bannerdi">
        <div class="navbar">
            <img src="images/logo.png" alt="Optic Logo" class="logo">
        </div>
        <div class="hero">
            <h1>Discover Clubs</h1>
        </div>
        <div class="hometextbtn">
            <a href="#ex"><span>Explore</span></a>
        </div>
    </section>

    <div id="ex"></div>

    <div class="container">
        <div class="image-container">
            <img src="images/pexels-ardit-mbrati-216809103-14972589.jpg" alt="Image 1">
            <div class="overlay"></div>
            <div class="overlay-text"><h2>Physical Clubs</h2></div>
            <a href="{{ route('clubs.physical') }}" class="search-button">🔍 Search</a>
        </div>
        <div class="image-container">
            <img src="images/pexels-karolina-grabowska-4887249.jpg" alt="Image 2">
            <div class="overlay"></div>
            <div class="overlay-text"><h2>Non-Physical Clubs</h2></div>
            <a href="{{ route('clubs.nonPhysical') }}" class="search-button">🔍 Search</a>
        </div>
    </div>
    

    <footer style="background:linear-gradient(rgba(0,0,0,0.5),#0066cc), url('{{ asset('images/background.jpeg') }}'); padding: 60px; display: flex; justify-content: space-around;">
        <div class="footer-content" style="display: flex; justify-content: space-around; gap: 20px; width: 100%;">
            <!-- Footer Logo -->
            <div class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Optic Clubs Logo" class="logo" style="width: 150px; height: auto; margin-right: 100px;">
            </div>
    
            <!-- Footer Text -->
            <div class="footer-text" style="width: 40%; margin-left: -200px;">
                <h3>Terms & Conditions</h3>
                <p>"Optic is your gateway to a vibrant community of sports enthusiasts, promoting all indoor and outdoor sports..."</p>
            </div>
    
            <!-- Social Media Links -->
            <div class="social-media">
                <h3>Social Media</h3>
                <a href="#"><img src="{{ asset('images/instagram.jpeg') }}" class="logo1" alt="Instagram" style="width: 30px; height: auto;"> Optic_clubs</a><br>
                <a href="#"><img src="{{ asset('images/facebook.jpeg') }}" class="logo1" alt="Facebook" style="width: 30px; height: auto;"> Optic_clubs</a><br>
                <a href="#"><img src="{{ asset('images/twitter.jpeg') }}" class="logo1" alt="Twitter" style="width: 30px; height: auto;"> Optic_clubs</a><br>
                <a href="#"><img src="{{ asset('images/youtube.jpeg') }}" class="logo1" alt="YouTube" style="width: 30px; height: auto;"> Optic_clubs</a>
            </div>
        </div>
    </footer>




@endsection