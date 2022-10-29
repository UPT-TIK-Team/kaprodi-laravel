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
      <li class="{{request()->is('admin')?'active':''}}">
        <a href="/admin" style="text-decoration: none;">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="{{request()->is('admin/data_pengguna')?'active':''}}">
        <a href="/admin/data_pengguna" style="text-decoration: none;">
          <i class="fa fa-users"></i>
          <span>Data Pengguna</span>
        </a>
      </li>
      @if (auth()->user()->role===1)
      <li class="{{request()->is('admin/data_calon')?'active':''}}">
        <a href="/admin/data_calon" style="text-decoration: none;">
          <i class="fa fa-users"></i>
          <span>Data Calon</span>
        </a>
      </li>
      <li class="{{request()->is('admin/data_pemilih')?'active':''}}">
        <a href="/admin/data_pemilih" style="text-decoration: none;">
          <i class="fa fa-users"></i>
          <span>Data Pemilih</span>
        </a>
      </li>
      <li class="{{request()->is('admin/data_prodi')?'active':''}}">
        <a href="/admin/data_prodi" style="text-decoration: none;">
          <i class="fa fa-list"></i>
          <span>Data Prodi</span>
        </a>
      </li>
      @endif
      <li>

      </li>
    </ul>
  </section>
</aside>