@extends('components.layout')

@section('title', $title)

@section('body')

<body {{$attributes->merge(['class' => 'hold-transition skin-blue sidebar-mini'])}}>
  @if ($title==="Halaman Login")
  {{$slot}}
  @else
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="bg-danger mx-2 border-0 text-white">
            <span>Logout</span>
            <i class="fa fa-sign-out"></i>
          </button>
        </form>
      </nav>
    </header>

    @include('partials.sidebar')

    <div class="content-wrapper">
      {{$slot}}
    </div>

    @include('partials.footer')

    @endif
</body>
@endsection