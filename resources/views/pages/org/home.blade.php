@extends('layouts.org')
@section('content')
    <!-- ======= Services Section ======= -->
    @include('components.org.activities')
    <!-- End Services Section -->

    <!-- ======= video and text Section ======= -->
    @include('components.org.video')
    <!-- End video and text Section -->

    <!-- ======= Features Section ======= -->
    @include('components.org.features')
    <!-- End Features Section -->
@endsection
@section('slide')
    @include('components.org.slide')
@endsection
