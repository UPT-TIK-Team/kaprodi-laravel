@push('scripts')
<script src="{{asset('/js/admin/pengguna.js')}}"></script>
@endpush

<x-body :title="'Halaman Data Pengguna'">
  <section class="content-header">
    <h1>Data Pengguna</h1>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-users"></i> Home</a></li>
      <li>Data Pengguna</li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <button id="btn-tambah-manual" class="btn btn-primary btn-flat" data-bs-toggle="modal"
          data-bs-target="#modal-form">
          <i class="fa fa-plus"></i>
          Tambah Data Pengguna
        </button>
      </div>
      <div class="box-body table-responsive" id="view-data">
        @include('admin.pengguna.table', ['dataPengguna'=>$dataPengguna])
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-info-circle"></i>
              File <strong>XLS</strong> (Excel 97-2003) yang diizinkan!!
            </div>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{asset('/img/loading.gif')}}" alt="" id="loading"
              style="height: 45px;"><br><br>
            <form action="" enctype="multipart/form-data" id="form">
              <input type="file" name="file" id="file" class="form-control pull-left" style="width: 50%;">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-flat" id="btn-upload">Upload</button>
            <button type="button" class="btn btn-default btn-flat" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-form">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <img src="{{asset('/img/loading.gif')}}" alt="" id="loading-manual" style="height: 45px;">
          </div>
          <div class="modal-body">
            <form action="" id="form">
              <input type="hidden" id="data-id">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" autofocus>
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" aria-label="Default select example" id="role">
                  <option selected>Pilih role</option>
                  <option value="1">Admin</option>
                  <option value="2">Panitia</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-flat" id="btn-simpan">Simpan</button>
            <button type="button" class="btn btn-primary btn-flat" id="btn-ubah">Ubah</button>
            <button type="button" class="btn btn-default btn-flat" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-hapus">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
          </div>
          <div class="modal-body">
            <div id="konfirmasi">Apakah anda yakin ingin menghapus semua data ini?</div>
            <img src="{{asset('/img/loading.gif')}}" alt="" id="load" style="height: 45px;">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-flat" id="btn-hapusData">Ya</button>
            <button type="button" class="btn btn-default btn-flat" data-bs-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-body>