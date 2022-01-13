@extends('layouts.admin')

@section('content')
    @if(\Auth::user()->role == "admin")
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @foreach($users as $user)
                        <div class="card-header mb-5 shadow">
                            <div class="row align-items-center">
                                <div class="col-3">Name: {{$user->firstname}} {{$user->lastname}}</div>
                                <div class="col-3">Current Position: {{$user->profile['position']}}</div>
                                <div class="col-3">First Language: {{$user->profile['language']}}</div>
                                <div class="col-3"><a href="/admin/{{$user->id}}" class="text-center btn btn-outline-success text-left mb-3">View User<i
                                            class="fas fa-chevron-right pl-3"></i></a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
