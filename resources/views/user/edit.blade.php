@extends('layouts.frontLayout')
@section('content')

    <div>
        <div class="card card-primary mt-4">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>
              <div>
                <a href="{{ route('home') }}" class="btn btn-sm btn-success float-right">All users</a>
              </div>
            </div>
            <!-- /.card-header -->
            @if (Session::has('success'))
                <p class="alert alert-success mt-5 mx-2">Successfully user updated!</p>
            @endif
            <!-- form start -->
            <form action="{{ route('update.user', $user->id) }}" method="post">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" value="{{ old('name') ?? $user->name }}" name="name" id="Name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') ?? $user->email }}" id="exampleInputEmail1" placeholder="Enter email">
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
