@extends('layouts.app')

@section('content')
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h2">Contact Us</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
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

                        <form method="POST" action="{{ route('contact-form.store') }}">

                            {{ csrf_field() }}
                            <input id="user_id"
                                   type="hidden"
                                   name="user_id"
                                   value="{{ \Auth::user()->id ?? old('No Account') }}">
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone:</strong>
                                        <input type="text"
                                               name="phone"
                                               class="form-control"
                                               placeholder="Phone"
                                               value="{{ old('phone') }}">

                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Subject:</strong>
                                        <input type="text"
                                               name="subject"
                                               class="form-control"
                                               placeholder="Subject"
                                               value="{{ old('subject') }}">

                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Message:</strong>
                                        <textarea name="message"
                                                  rows="3"
                                                  class="form-control">{{ old('message') }}</textarea>

                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.3253860539!2d-0.0858882838412182!3d51.525591517193455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4877278199d62e09%3A0x1e9ca5c9e686fc39!2sHospitality%20Search%20International!5e0!3m2!1sen!2suk!4v1616414177437!5m2!1sen!2suk"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6 align-self-center pt-5 pb-5" style="background-color:#F2F2F2;">
                <div class="h2 pl-2" style="color: #0A650A">Contact Details</div>
                <div class="pl-2">Hospitality Search International</div>
                <div class="pl-2">4th Floor, 86 - 90 Paul Street</div>
                <div class="pl-2">London</div>
                <div class="pl-2">EC2A 4NE</div>
                <div class="pl-2">United Kingdom</div>
                <div class="pl-2"><a href="tel:+442033229391">+44 (0) 203 322 9391</a></div>
                <div class="pl-2"><a href="mailto:apply@hospitalitysearch.co.uk">apply@hospitalitysearch.co.uk</a></div>
            </div>
        </div>
    </div>
    </body>
    </html>

@endsection
