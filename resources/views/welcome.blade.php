@extends('layouts.app')

@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="max-height: 40rem">
                <img class="d-block w-100" src="/images/Slideshow-Images/Slide_1.jpeg" class="d-block w-100" alt="First slide">
                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.8); color: #0A650A">
                <h2>Hospitality Search International</h2>
                <p>Your Global Recruitment Partner</p>
                </div>
            </div>
            <div class="carousel-item" style="max-height: 40rem">
                <img class="d-block w-100" src="/images/Slideshow-Images/Slide_2.jpeg" class="d-block w-100" alt="Second slide">
                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.8); color: #0A650A">
                    <h2>Hospitality Search International</h2>
                    <p>Your Global Recruitment Partner</p>
                </div>
            </div>
            <div class="carousel-item" style="max-height: 40rem">
                <img class="d-block w-100" src="/images/Slideshow-Images/Slide_3.jpeg" class="d-block w-100" alt="Third slide">
                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.8); color: #0A650A">
                    <h2>Hospitality Search International</h2>
                    <p>Your Global Recruitment Partner</p>
                </div>
            </div>
            <div class="carousel-item" style="max-height: 40rem">
                <img class="d-block w-100" src="/images/Slideshow-Images/Slide_4.jpeg" class="d-block w-100" alt="Fourth slide">
                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.8); color: #0A650A">
                    <h2>Hospitality Search International</h2>
                    <p>Your Global Recruitment Partner</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div class="pb-3 pt-3">
                <div class="h2">Featured Jobs</div>
            </div>
        </div>
        @foreach($positions as $position)
        <div class="col-2">

        </div>
        @endforeach
    </div>

@endsection
