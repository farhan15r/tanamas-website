@extends('layouts.main')

@section('content')
    {{-- @dd(route('login.index')) --}}
    {{-- @dd(route()) --}}
    {{-- {{route('login.index')}} --}}
    {{-- @dd(config('app.url')) --}}
    {{-- @dd(Config::get('app.url')) --}}

    @include('components.alert')

    @include('components.index.hero')
    @include('components.index.about')
    @include('components.index.testimonial')
    @include('components.index.blog')
@endsection
