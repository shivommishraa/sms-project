@extends('frontend.layouts.app')
@section('title','News & Events')
@section('content')

<!-- Page Title -->
<div class="page-title" data-aos="fade">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>News & Events</h1>
                    <p class="mb-0">
                        Stay informed about the latest school news, celebrations,
                        competitions, educational tours and upcoming events at
                        ABC Public School.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">News & Events</li>
            </ol>
        </div>
    </nav>
</div>

<!-- Events Section -->
<section id="events" class="events section">

    <div class="container" data-aos="fade-up">

        <div class="row">

            <!-- Event 1 -->
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card">

                    <div class="card-img">
                        <img src="{{ asset('frontend/assets/img/event/event-item-1.webp') }}" alt="">
                    </div>

                    <div class="card-body">

                        <h5 class="card-title">
                            <a href="">Annual Science Exhibition</a>
                        </h5>

                        <p class="fst-italic text-center">
                            Saturday, 15 August | 10:00 AM
                        </p>

                        <p class="card-text">
                            Students will showcase innovative science models,
                            experiments and creative projects developed under the
                            guidance of experienced teachers. Parents are warmly
                            invited to witness their talent.
                        </p>

                    </div>

                </div>
            </div>

            <!-- Event 2 -->
            <div class="col-md-6 d-flex align-items-stretch">

                <div class="card">

                    <div class="card-img">
                        <img src="{{ asset('frontend/assets/img/event/event-item-2.webp') }}" alt="">
                    </div>

                    <div class="card-body">

                        <h5 class="card-title">
                            <a href="">Annual Sports Meet</a>
                        </h5>

                        <p class="fst-italic text-center">
                            Saturday, 29 August | 9:00 AM
                        </p>

                        <p class="card-text">
                            Join us for an exciting day of athletics, team games,
                            cultural performances and prize distribution.
                            Students will demonstrate teamwork, confidence and
                            sportsmanship.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection