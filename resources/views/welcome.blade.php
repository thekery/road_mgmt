@extends('template')

@section('content')
    <div class="jumbotron content">
        <h1 class="display-4">Traffic restriction</h1>
        <p class="lead">Road management organizations regularly publish the country-wide traffic restriction data.
            </p>
        <hr class="my-4">
        <p>Here you can find information:</p>
        <a class="btn btn-primary btn-lg" href="{{ url('/info') }}" role="button">Learn more</a>
    </div>
@endsection