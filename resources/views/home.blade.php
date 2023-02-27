@extends('layout.app')

@section('main-content')
    <section class="current-movies text-center">
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row ">
                <h4 class="series-title"> CURRENT MOVIES </h4>
            </div>
            <a href="/new-page" onclick="window.location.href='/new-page';">
                <button type="button" class="btn btn-primary">Go New Page</button>
              </a>
        </div>
    </section>
@endsection
