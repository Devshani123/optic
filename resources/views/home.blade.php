@extends('layouts.app')

@section('title', 'Optic Clubs - Home')

@section('content')
    @vite('resources/css/styles.css')
    @vite('resources/js/calendar.js')

    <!-- Banner Section -->

    <style>
        #banner {
            background: linear-gradient(rgba(0,0,0,0.5), #128b9e94), url('{{ asset('images/home back.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        </style>
        



    <section id="banner">
        <div class="navbar">
            <img src="{{ asset('images/logo.png') }}" alt="Optic Logo" class="logo">
            {{-- <nav>
                <a href="{{ route('clubs.discover') }}">Discover Clubs</a>
                <a href="#my-clubs">My Clubs</a>
                @guest
                    <a href="{{ route('register') }}">Register</a>
                @endguest
            </nav> --}}
        </div>

        <!-- Hero Section -->
        <div class="hero1">
            <p>Optic is your gateway to a vibrant community of sports enthusiasts, promoting all indoor and outdoor sports...</p>
        </div>

        <!-- Explore Button -->
        <div class="hometextbtn">
            <a href="#ex"><span>Explore</span></a>
        </div>
    </section>

    <!-- Main Content -->
    <main>
        <div id="ex"></div>
        <section class="events-section">
            <div class="calendar-container">
                <h2>Calendar</h2>
                <div class="calendar">
                    <div class="calendar-header">
                        <button onclick="prevMonth()">&#9664;</button>
                        <div id="month-year">October 2024</div>
                        <button onclick="nextMonth()">&#9654;</button>
                    </div>
                    <div class="calendar-weekdays">
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                        <div>Sun</div>
                    </div>
                    <div class="calendar-days" id="calendar-days">
                        <!-- JS will populate days -->
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="upcoming-events">
                <h2>Upcoming Events</h2>
                <div class="upcoming-events-container">
                    <div class="event">
                        <img src="{{ asset('images/cricket.jpg') }}" alt="Cricket Event">
                        <p>Cricket Event</p>
                        <button class="join-button">Join</button>
                    </div>
                    <div class="event">
                        <img src="{{ asset('images/football.jpg') }}" alt="Football Event">
                        <p>Football Event</p>
                        <button class="join-button">Join</button>
                    </div>
                    <div class="event">
                        <img src="{{ asset('images/chess.jpg') }}" alt="Chess Event">
                        <p>Chess Event</p>
                        <button class="join-button">Join</button>
                    </div>
                    <div class="event">
                        <img src="{{ asset('images/karate.jpg') }}" alt="Karate Event">
                        <p>Karate Event</p>
                        <button class="join-button">Join</button>
                    </div>
                    <div class="event">
                        <img src="{{ asset('images/karate.jpg') }}" alt="Karate Event">
                        <p>Karate Event</p>
                        <button class="join-button">Join</button>
                    </div>
                    <div class="event">
                        <img src="{{ asset('images/karate.jpg') }}" alt="Karate Event">
                        <p>Karate Event</p>
                        <button class="join-button">Join</button>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer style="background:linear-gradient(rgba(0,0,0,0.5),#0066cc), url('{{ asset('images/background.jpg') }}'); padding: 60px; display: flex; justify-content: space-around;">
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
