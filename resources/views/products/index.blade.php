@extends('layout.user')

@section('main')
    <div class="container-fluid">
        <div class="float-end">
            <a href="{{ route('createpage') }}" class="btn btn-secondary mt-5 me-5">New Product</a> 
        </div>
    </div>
    <div class="container-fluid mt-5 pt-3">
        <div class="mt-5">
        <table class="table table-secondary table-striped table-hover mt-5 mx-auto" style="width: 1250px;">
            <thead>
                <tr>
                  <th scope="col" class="col-sm-1">ProductID</th>
                  <th scope="col" class="col-sm-3">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col" class="col-sm-2 text-center">Image</th>
                  <th scope="col" class="col-sm-2 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr>
                  <th>{{ $loop->index+1 }}</th>
                  <td><a href="{{ route('dogshow', $product->id) }}" class="text-dark text-decoration-none">{{ $product->name }}</a></td>
                  <td>{{ $product->description }}</td>
                  <td class="text-center"><img src="{{ asset('products/'.$product->image) }}" class="rounded" width="80" height="80"/></td>
                  <td class="text-center">
                    <a href="{{ route('edits', $product->id) }}" class="btn btn-primary">Edit</a> 

                    <form method="POST" class="d-inline" action="{{ route('delete', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
                @endforeach
              </tbody>
        </table>
        {{ $products->links() }}
        </div>
    </div>

@endsection
