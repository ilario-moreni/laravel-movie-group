@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container d-flex">
        <a href=""><button type="button" class="btn btn-primary mt-2">Aggiungi un nuovo Film</button></a>
    </div>
    <h2 class="my-4"> Film </h2>
    <div class="row">
        @foreach ( )
            <div class="col-4 my-2">
                <a href="">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="" >
                        <div class="card-body">
                            <h5></h5>
                          
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection