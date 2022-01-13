@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
              integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
              crossorigin="anonymous">
    </head>
    <div class="container">
        <a href="{{ route('blog.index') }}" class="text-center btn btn-outline-success text-left mb-3"><i
                class="fas fa-chevron-left pr-3"></i>Back to Blogs</a>
        <div class="shadow card mb-5">
            <img class="card-img-top" src="{{$blog->image ?? 'Blog Image'}}" alt="Card image cap">
            <div class="card-body">
                <h1 class="card-title text-center" style="color: #0A650A; text-transform: capitalize;">{{$blog->title ?? 'Blog Title'}}</h1>
                <div class="text-right d-flex flex-column justify-content-end">
                    <span class="card-text"><small class="text-muted">Author - Jonathan Bishop</small></span>
                    <span class="card-text pb-3"><small
                            class="text-muted">Created - {{$blog->created_at ?? 'Created Date'}}</small></span>
                </div>
                <p class="card-text">{!! $blog->description ?? 'Description' !!}</p>
            </div>
        </div>
        <a href="{{ route('blog.index') }}" class="text-center btn btn-outline-success text-left mb-3"><i
                class="fas fa-chevron-left pr-3"></i>Back to Blogs</a>
    </div>

@endsection
