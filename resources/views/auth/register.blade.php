<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card card-body">
                <h3 class="text-center mb-3">REGISTER</h3>
                @if (session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="mb-4" action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <div class="mb-3">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <span>You have already account ? <a href="{{route('login')}}">Login</a></span>
            </div>
        </div>
    </div>
</body>
</html>