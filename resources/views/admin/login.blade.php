@extends('components.layout')

@section('title', 'Login Admin')

@section('body')

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="text-center">
      <img src={{ asset('/img/unsika-logo.png') }} alt="" class="img-responsive">
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Please sign in to continue.</p>
      <form action="/login/authenticate" method="POST">
        @csrf

        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}">
          @error('username')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          @error('password')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="row mt-3">
          <div class="col-xs-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
@endsection