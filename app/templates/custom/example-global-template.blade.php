@extends('core.layout')

@section('content')
    <!-- {{ $controller }} -->
    @php
        while ( have_posts() ) : the_post();
        the_content();
        endwhile;
    @endphp
@endsection