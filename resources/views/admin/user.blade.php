@extends('layouts.admin')

@section('content')
    @if(\Auth::user()->role == "admin")
        <div class="container">
            <div class="row">

                <div class="col-9 pt-5">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="d-flex align-items-center pb-3">
                            <div class="h2">{{ $user->firstname ?? ''}} {{ $user->lastname ?? ''}} Profile</div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion">
                <div class="card mb-5">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <i class="fas fa-user" style="color: #0A650A"></i>
                            <button style="color: #0A650A; font-size: 1.5rem;" class="btn btn-link"
                                    data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Account Details
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Email Address:</strong>
                                            <input type="text"
                                                   readonly
                                                   name="position"
                                                   class="form-control"
                                                   placeholder="Position"
                                                   value="{{ $user->email ?? old('Email Address') }}">

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
                                                      readonly
                                                      rows="5"
                                                      placeholder="Cover Letter"
                                                      class="form-control">{{ $user->profile->coverLetter ?? old('Cover Letter') }}</textarea>
                                            @if ($errors->has('coverLetter'))
                                                <span class="text-danger">{{ $errors->first('coverLetter') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Current Position:</strong>
                                            <input type="text"
                                                   readonly
                                                   name="position"
                                                   class="form-control"
                                                   placeholder="Position"
                                                   value="{{ $user->profile->position ?? old('Current Position') }}">

                                            @if ($errors->has('position'))
                                                <span class="text-danger">{{ $errors->first('position') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>First Language:</strong>
                                            <input type="text"
                                                   readonly
                                                   name="language"
                                                   class="form-control"
                                                   placeholder="Language"
                                                   value="{{ $user->profile->language ?? old('First Language') }}">
                                            @if ($errors->has('language'))
                                                <span class="text-danger">{{ $errors->first('language') }}</span>
                                            @endif
                                        </div>
                                    </div>
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
                                Current Applications
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
                                            <div class="font-weight-bold pr-3" style="border-right: 1px solid #0A650A;">
                                                <i
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
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                                @php
                                                    Session::forget('success');
                                                @endphp
                                            </div>
                                        @endif
                                        <form method="POST" action="/admin/{{$user->id}}">
                                            {{ method_field('POST') }}
                                            {{ csrf_field() }}
                                            <div class="row align-items-center">
                                                <div class="col-md-4 pl-5">
                                                    <div class="form-group">
                                                        <strong>Application Status:</strong>
                                                        <input type="text"
                                                               name="language"
                                                               class="form-control"
                                                               placeholder="Status"
                                                               value="{{$application->status ?? ''}}">
                                                        @if ($errors->has('status'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('status') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group text-center">
                                                        <button class="btn btn-success btn-submit">Update Status
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    @endif
@endsection
