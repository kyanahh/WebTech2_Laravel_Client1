@extends('layout.user')

@section('main')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card p-4 mt-5 shadow mb-5">
                <p>Name : <b>{{ $product->name }}</b></p>
                <p>Description : <b>{{ $product->description }}</b></p>
                <div class="text-center">
                    <img src="/products/{{ $product->image }}" class="rounded" width="100%"/>
            </div>
        </div>
    </div>
</div>

@endsection