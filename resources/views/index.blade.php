@extends('layouts.main')

@section('content')
    @include('components.alert')

    @include('components.index.hero')
    @include('components.index.product')
    {{-- @include('components.index.testimonial') --}}
@endsection
