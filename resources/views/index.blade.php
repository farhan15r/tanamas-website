@extends('layouts.main')

@section('content')
    @include('components.alert')

    @include('components.index.hero')
    @include('components.index.about')
    @include('components.index.testimonial')
    @include('components.index.blog')
@endsection
