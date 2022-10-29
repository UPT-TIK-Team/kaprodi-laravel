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
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset('img/avatar.jpg') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            {{auth()->user()->name}}
            <a><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <ul class="sidebar-menu">
          <li class="header">MENU</li>
          <li><a href="/admin" style="text-decoration: none;"><i class="fa fa-dashboard"></i>
              <span>Dashboard</span></a></li>
          @if (auth()->user()->role===1)
          <li><a href="/admin/data_pengguna" style="text-decoration: none;"><i class="fa fa-users"></i> <span>Data
                Pengguna</span></a></li>
          <li><a href="/admin/data_calon" style="text-decoration: none;"><i class="fa fa-users"></i> <span>Data
                Calon</span></a></li>
          <li><a href="/admin/data_pemilih" style="text-decoration: none;"><i class="fa fa-users"></i>
              <span>Data Pemilih</span></a></li>
          <li><a href="/admin/data_prodi" style="text-decoration: none;"><i class="fa fa-list"></i>
              <span>Data Prodi</span></a></li>
          @else
          <li><a href="/admin/data_calon" style="text-decoration: none;"><i class="fa fa-users"></i> <span>Data
                Calon</span></a></li>
          @endif
          <li><a href="/logout" style="text-decoration: none;"><i class="fa fa-sign-out"></i>
              <span>Logout</span></a></li>
        </ul>
      </section>
    </aside>

    <div class="content-wrapper">
      {{$slot}}
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">Made By UPT TIK TEAM</div>
      <span>Copyright &copy;
        <?= date('Y') ?> All rights reserved.
      </span>
    </footer>
    @endif
</body>
@endsection