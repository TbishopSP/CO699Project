@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h2">Employee Resources</div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($blogs as $blog)
            <div class="shadow card mb-5">
                <img class="card-img-top" src="{{$blog->image ?? 'Blog Image'}}" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title" style="color: #0A650A; text-transform: capitalize;">{{$blog->title ?? 'Blog Title'}}</h3>
                    <p class="card-text">{{$blog->shortDescription ?? 'Short Description'}}</p>
                    <div class="text-right d-flex flex-column justify-content-end">
                        <p class="card-text pb-3"><small class="text-muted">Author - Jonathan Bishop</small></p>
                        <a href="{{ route('blog.show', $blog->id) }}" class="text-center btn btn-success text-right">Read
                            More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-12 d-flex justify-content-center pt-5" style="color: #0A650A; ">
            {{$blogs->links()}}
        </div>


@endsection
