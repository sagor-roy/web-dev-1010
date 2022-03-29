@extends('layouts.master')

@section('content')
<section class="my-5">
    <div class="text-center mb-4">
        <h3 class="border-bottom pb-3 d-inline-block">CREATE STUDENT</h3>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="card card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{route('store')}}" method="POST">
                @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter your name">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Roll</label>
                <input type="number" name="roll" value="{{old('roll')}}" class="form-control" placeholder="Enter your roll">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter your email">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('home')}}" class="btn btn-warning">Back</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection