@extends('layouts.master')

@section('content')

<section class="my-5">
  <div class="text-center mb-4">
      <h3>{{Auth::user()->name}}</h3>
  </div>
  <div class="container">
    @if (session('message'))
      <div class="alert alert-success">
        {{session('message')}}
    </div>
      @endif
      <a href="{{route('create')}}" class="btn btn-primary float-end mb-1">CREATE</a>
      <table class="table table-bordered table-striped text-center">
          <thead class="table-dark">
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Name</th>
              <th scope="col">Roll</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->name}}</td>
              <td>{{$item->roll}}</td>
              <td>{{$item->email}}</td>
              <td class="d-flex">
                  <a href="{{route('edit',$item->id)}}" class="btn btn-sm btn-primary me-3">Edit</a>
                  <form action="{{route('delete',$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
  </div>
</section>
@endsection