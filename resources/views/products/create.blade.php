@extends('layout.user')    

@section('main')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card bg-light mt-5 p-4">
                    <form action="{{ route('storage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <h1 class="h4 mb-4">Create Product</h1>
                        <div class="form-group mb-3">
                            <label for="name" class="mb-2">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="mb-2">Description</label>
                            <textarea type="text" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="image" class="mb-2">Image</label>
                            <input type="file" name="image" class="form-control"/>
                            @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-secondary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection