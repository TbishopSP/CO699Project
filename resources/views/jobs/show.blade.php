@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
              integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
              crossorigin="anonymous">
    </head>

    <div class="container">
        <div class="row">
            <div class="col-12 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h2">Application</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="shadow card mb-5">
                <div class="card-header d-flex flex-row align-items-center" style="color: #0A650A; font-size: 1rem;">
                    <div class="font-weight-bold pr-3" style="border-right: 1px solid #0A650A;"><i
                            class="fas fa-male pr-3"></i>{{$position->jobTitle ?? 'Job Title'}}</div>
                    <div class="font-weight-bold pl-3 pr-3"
                         style="border-right: 1px solid #0A650A"><i
                            class="fas fa-map-marker-alt pr-3"></i>{{$position->location ?? 'Location'}}</div>
                    <div class="font-weight-bold pl-3"><i
                            class="fas fa-dollar-sign pr-3"></i>{{$position->salary ?? '5000'}} USD
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$position->description ?? 'Job Description'}}</p>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <form method="POST" action="{{ route('jobs.apply',$position->id) }}">
                        {{ csrf_field() }}
                        <input id="user_id"
                               type="hidden"
                               name="user_id"
                               value="{{ \Auth::user()->id ?? old('ID') }}">
                        <input id="position_id"
                               type="hidden"
                               name="position_id"
                               value="{{ $position->id ?? old('ID') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input id="name"
                                           type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Name"
                                           value="{{ Auth::user()->firstname ?? old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="text"
                                           name="email"
                                           class="form-control"
                                           placeholder="Email"
                                           value="{{ Auth::user()->email ?? old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Cover Letter:</strong>
                                    <textarea name="coverLetter"
                                              rows="10"
                                              class="form-control">{{ Auth::user()->profile->coverLetter ?? old('Cover Letter') }}</textarea>
                                    @if ($errors->has('coverLetter'))
                                        <span class="text-danger">{{ $errors->first('coverLetter') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success btn-submit">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{ route('jobs.index') }}" class="text-center btn btn-outline-success text-left mb-3"><i
                    class="fas fa-chevron-left pr-3"></i>Back to Jobs</a>
        </div>
    </div>


@endsection
