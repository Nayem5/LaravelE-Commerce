<!-- resources/views/homepage.blade.php -->

@extends('layout')

@section('title', 'Homepage')

@section('styles')
    <style>
        /* Custom styles specific to this page */
        .carousel-item {
            height: 500px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero {
            padding: 3rem 0;
            text-align: center;
            background-color: #f8f8f8;
        }

        .features {
            padding: 3rem 0;
            background-color: #fff;
        }

        .feature {
            text-align: center;
            padding: 2rem;
        }

        .feature h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .feature p {
            color: #666;
        }

        .cta {
            text-align: center;
            padding: 3rem 0;
            background-color: #007bff;
            color: #fff;
        }

        .cta h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.25rem;
        }
    </style>
@endsection

@section('content')
<div style="background-color: rgb(240, 235, 229)">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://marketplace.canva.com/EAFCz4dHm4Q/1/0/1600w/canva-black-minimal-grand-opening-banner-fsdmiwF1O28.jpg');">
                <div class="carousel-caption">
                    <h3>Slide 1</h3>
                    <p>Description for slide 1.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://marketplace.canva.com/EAFVfgsKMAE/1/0/1600w/canva-black-and-yellow-simple-minimalist-burger-promotion-banner-YTqWS2eL8TM.jpg');">
                <div class="carousel-caption">
                    <h3>Slide 2</h3>
                    <p>Description for slide 2.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://marketplace.canva.com/EAFCP0LmUuk/1/0/1600w/canva-orange-simple-grand-opening-restaurant-promotions-banner-KY1Luvuh71U.jpg');">
                <div class="carousel-caption">
                    <h3>Slide 3</h3>
                    <p>Description for slide 3.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <div class="hero">
        <h1>Welcome to Our Na Yums!</h1>
        <p>A heaven for food lover.</p>
        <button class="btn btn-primary" onclick="alert('Hello!')">Click Me</button>
    </div>

    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <h3>Feature 1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <h3>Feature 2</h3>
                        <p>Sed feugiat massa ac augue tincidunt, eu mattis velit tincidunt.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <h3>Feature 3</h3>
                        <p>Nullam fermentum sem vel felis blandit, vel blandit libero tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cta">
        <div class="container">
            <h2>Call to Action</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat massa ac augue tincidunt, eu mattis velit tincidunt.</p>
            <button class="btn btn-light">Learn More</button>
        </div>
    </div>
</div>

    <script>
        // JavaScript to make the carousel auto-move
        $(document).ready(function() {
            $('#carouselExampleIndicators').carousel({
                interval: 5000 // Change the interval (in milliseconds) as needed
            });
        });
    </script>
@endsection
