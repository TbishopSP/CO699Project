@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
              integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
              crossorigin="anonymous">
    </head>

    <div class="container">
        <div class="row">
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h2">Our Jobs</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($positions as $position)
        <div class="container">
            <div class="shadow card mb-5">
                <div class="card-header d-flex flex-row align-items-center" style="color: #0A650A; font-size: 1rem;">
                    <div class="font-weight-bold pr-3" style="border-right: 1px solid #0A650A;"><i
                            class="fas fa-male pr-3"></i>{{$position->jobTitle ?? 'Job Title'}}</div>
                    <div class="font-weight-bold pl-3 pr-3"
                         style="border-right: 1px solid #0A650A"><i class="fas fa-map-marker-alt pr-3"></i>{{$position->location ?? 'Location'}}</div>
                    <div class="font-weight-bold pl-3"><i class="fas fa-dollar-sign pr-3"></i>{{$position->salary ?? '5000'}} USD</div>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$position->description ?? 'Job Description'}}</p>
                    <div class="form-group text-right">
                        <a href="{{ route('jobs.show', $position->id) }}">
                            <button class="btn btn-outline-success btn-submit">Apply <i
                                    class="fas fa-chevron-right"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    @endforeach

    <div class="col-12 d-flex justify-content-center pt-5" style="color: #0A650A; ">
        {{$positions->links()}}
    </div>
@endsection
