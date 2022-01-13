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
                        <div class="h2">Welcome {{ $user->firstname ?? ''}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="accordion">
            <div class="card mb-5">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <i class="fas fa-user" style="color: #0A650A"></i>
                        <button style="color: #0A650A; font-size: 1.5rem;" class="btn btn-link" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Update My Account
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card">
                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif
                            <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <input id="user_id"
                                       type="hidden"
                                       name="user_id"
                                       value="{{ \Auth::user()->id ?? old('No Account') }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Cover Letter:</strong>
                                            <textarea name="coverLetter"
                                                      rows="5"
                                                      placeholder="Cover Letter"
                                                      class="form-control">{{ Auth::user()->profile->coverLetter ?? old('Cover Letter') }}</textarea>
                                            @if ($errors->has('coverLetter'))
                                                <span class="text-danger">{{ $errors->first('coverLetter') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Position:</strong>
                                            <input type="text"
                                                   name="position"
                                                   class="form-control"
                                                   placeholder="Position"
                                                   value="{{ Auth::user()->profile->position ?? old('position') }}">

                                            @if ($errors->has('position'))
                                                <span class="text-danger">{{ $errors->first('position') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Language:</strong>
                                            <input type="text"
                                                   name="language"
                                                   class="form-control"
                                                   placeholder="Language"
                                                   value="{{ Auth::user()->profile->language ?? old('language') }}">
                                            @if ($errors->has('language'))
                                                <span class="text-danger">{{ $errors->first('language') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Upload CV:</strong>
                                            <input type="file" name="file_path" id="file_path" accept="application/pdf" class="form-control-file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <button class="btn btn-success btn-submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <i class="fas fa-bars" style="color: #0A650A"></i>
                    <button style="color: #0A650A; font-size: 1.5rem;" class="btn btn-link collapsed"
                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                        My Applications
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body pre-scrollable">
                    @foreach($applications as $application)
                        @if($application->user_id == \Auth::user()->id)
                            <div class="shadow card mb-5">
                                <div class="card-header d-flex flex-row align-items-center"
                                     style="color: #0A650A; font-size: 1rem;">
                                    <div class="font-weight-bold pr-3" style="border-right: 1px solid #0A650A;"><i
                                            class="fas fa-male pr-3"></i>{{$application->position->jobTitle ?? 'Job Title'}}
                                    </div>
                                    <div class="font-weight-bold pl-3 pr-3"
                                         style="border-right: 1px solid #0A650A"><i
                                            class="fas fa-map-marker-alt pr-3"></i>{{$application->position->location ?? 'Location'}}
                                    </div>
                                    <div class="font-weight-bold pl-3"><i
                                            class="fas fa-dollar-sign pr-3"></i>{{$application->position->salary ?? '5000'}}
                                        USD
                                    </div>
                                </div>
                                @if($application->status == "Processing" || $application->status == "")
                                    <div class="card-body bg-warning">
                                        <p class="font-weight-bold" style="color: #FFF; font-size:1.5rem;">
                                            Processing</p>
                                    </div>
                                @endif
                                @if($application->status == "Unsuccessful")
                                    <div class="card-body bg-danger">
                                        <p class="font-weight-bold" style="color: #FFF; font-size:1.5rem;">
                                            Unsuccessful</p>
                                    </div>
                                @endif
                                @if($application->status == "Successful")
                                    <div class="card-body bg-success">
                                        <p class="font-weight-bold" style="color: #FFF; font-size:1.5rem;">
                                            Successful</p>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                    <a href="{{ route('jobs.index') }}" class="text-center btn btn-outline-success text-left mb-3">View
                        Available Positions<i
                            class="fas fa-chevron-right pl-3"></i></a>
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <i class="fas fa-envelope" style="color: #0A650A"></i>
                    <button style="color: #0A650A; font-size: 1.5rem;" class="btn btn-link collapsed"
                            data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                        My Messages
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body pre-scrollable">
                    @foreach($contacts as $contact)
                        @if($contact->user_id == \Auth::user()->id)
                            <div class="card-header mt-5 bg-info d-flex flex-row align-items-center"
                                 style="color: #FFF; font-size: 1rem;">
                                <div class="font-weight-bold pr-3">Message
                                </div>
                            </div>
                            <div class="shadow card mb-2">
                                <div class="card-header d-flex flex-row align-items-center"
                                     style="color: #0A650A; font-size: 1rem;">
                                    <div class="font-weight-bold pr-3">{{$contact->subject ?? 'Subject'}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>{{$contact->message ?? 'Message'}}</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header d-flex flex-row align-items-center"
                                     style="color: #0A650A; font-size: 1rem;">
                                    <div class="font-weight-bold pr-3">Reponse
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>{{$contact->response ?? ''}}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <i class="fas fa-sign-out-alt" style="color: #0A650A"></i>
                    <button style="color: #0A650A; font-size: 1.5rem;" class="btn btn-link collapsed"
                            data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                            aria-controls="collapseFour">

                        <a style="color: #0A650A;" class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                    <form action="{{ route('profile.destroy', $user->id) }}" method="POST">
                        <i class="fas fa-times" style="color: #0A650A"></i>
                        @csrf
                        @method('DELETE')
                        <button style="color: #0A650A; font-size: 1.5rem;" class="btn btn-link collapsed"
                                data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                                aria-controls="collapseFive">
                            Delete My Account
                        </button>
                    </form>
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
