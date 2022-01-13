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
                <img class="d-block w-100" src="/images/Slideshow-Images/Slide_1.jpeg" class="d-block w-100"
                     alt="First slide">
                <div class="carousel-caption d-none d-md-block"
                     style="background-color: rgba(255, 255, 255, 0.8); color: #0A650A">
                    <h1>Hospitality Search International</h1>
                    <h2>Your Global Recruitment Partner</h2>
                </div>
            </div>
            <div class="carousel-item" style="max-height: 40rem">
                <img class="d-block w-100" src="/images/Slideshow-Images/Slide_2.jpeg" class="d-block w-100"
                     alt="Second slide">
                <div class="carousel-caption d-none d-md-block"
                     style="background-color: rgba(255, 255, 255, 0.8); color: #0A650A">
                    <h1>Hospitality Search International</h1>
                    <h2>Your Global Recruitment Partner</h2>
                </div>
            </div>
            <div class="carousel-item" style="max-height: 40rem">
                <img class="d-block w-100" src="/images/Slideshow-Images/Slide_3.jpeg" class="d-block w-100"
                     alt="Third slide">
                <div class="carousel-caption d-none d-md-block"
                     style="background-color: rgba(255, 255, 255, 0.8); color: #0A650A">
                    <h1>Hospitality Search International</h1>
                    <h2>Your Global Recruitment Partner</h2>
                </div>
            </div>
            <div class="carousel-item" style="max-height: 40rem">
                <img class="d-block w-100" src="/images/Slideshow-Images/Slide_4.jpeg" class="d-block w-100"
                     alt="Fourth slide">
                <div class="carousel-caption d-none d-md-block"
                     style="background-color: rgba(255, 255, 255, 0.8); color: #0A650A">
                    <h1>Hospitality Search International</h1>
                    <h2>Your Global Recruitment Partner</h2>
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
    </div>
    <div class="row d-flex justify-content-center">
        @foreach($positions as $position)
            <div class="shadow col-2 mr-5 ml-5 justify-content-center d-flex align-items-center flex-column"
                 style="border: 1px solid #0A650A; text-align: center">
                <div class="font-weight-bold"
                     style="font-size: 1rem; text-align: center">{{$position->jobTitle ?? 'Job Title'}}</div>
                <div class="pt-3"
                     style=" overflow: hidden; text-overflow: ellipsis; max-width: 200px; height: 100px">{{$position->description ?? 'Location'}}</div>
                <div class="font-italic font-weight-bold pt-3">{{$position->location ?? 'Location'}}</div>
                <div class="font-italic pt-1 pb-5"
                     style="border-bottom: 1px solid #383d41; width: 80%; text-align: center">{{$position->salary ?? '5000'}}
                    USD
                </div>
                <div class="form-group text-center pt-5">
                    <a href="{{ route('jobs.show', $position->id) }}">
                        <button class="btn btn-outline-success btn-submit">View More <i
                                class="fas fa-chevron-right"></i></button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
