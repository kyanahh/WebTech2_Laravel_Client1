@extends('layout.user')

@section('main')

    <div class="container-fluid">
        <div class="row">
            <div class="col-auto mt-5">
                <pre class="mt-5 ms-5 h1 fw-bold";>LIST YOUR PRODUCTS 
HERE FOR YOUR BUSINESS</pre>
                <pre class="ms-5 h5">A collection of super and high quality products
where you can list everything</pre>
                <a href="{{ route('createpage') }}" class="btn btn-secondary ms-5 mt-4">Create Product</a>
            </div>
            <div class="col-auto d-inline">
                <img class="ms-5" src="https://media.istockphoto.com/id/1313833233/vector/business-rule-abstract-concept-vector-illustration.jpg?s=612x612&w=0&k=20&c=NEyb5q2Jqf7_RUp2cKJW0Y1iSRNkma2wT9XOWLk1NTM="/> 
            </div>
        </div>
    </div>

@endsection