@extends('layouts.frontLayout')
@section('content')
    <div>
        <div class="card card-primary mt-4">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>
              <div>
                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-success float-right">All Categories</a>
              </div>
            </div>
            <!-- /.card-header -->
            @if (Session::has('success'))
                <p class="alert alert-success mt-5 mx-2">Successfully category added!</p>
            @endif
            <!-- form start -->
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="Name" placeholder="Enter name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" value="{{ old('slug') }}" name="slug" id="slug" placeholder="Enter slug">
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>
@endsection
