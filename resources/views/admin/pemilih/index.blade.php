@push('scripts')
<script src="{{asset('/js/admin/pemilih.js')}}"></script>
@endpush

<x-body :title="'Halaman Data Pemilih'">
  <section class="content-header">
    <h1>Data Dosen Pemilih</h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-users"></i> Home</a></li>
      <li>Data Dosen Pemilih</li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        {{-- <button id="btn-tambah-manual" class="btn btn-primary btn-flat" data-bs-toggle="modal"
          data-bs-target="#modal-form">
          <i class="fa fa-plus"></i>
          Tambah Data Manual
        </button> --}}
        <button class="btn btn-success btn-flat" data-bs-toggle="modal" data-bs-target="#modal-tambah">
          <i class="fa fa-plus"></i>
          Tambah Data Excel
        </button>
        <button class="btn btn-danger btn-flat" data-bs-toggle="modal" data-bs-target="#modal-hapus">
          <i class="fa fa-trash"></i>
          Hapus Semua
        </button>
      </div>
      <div class="box-body table-responsive" id="view-data">
        @include('admin.pemilih.table', ['dataPemilih'=>$dataPemilih])
      </div>
    </div>

    <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <img src="{{asset('/img/loading.gif')}}" alt="" id="loading-manual" style="height: 45px;">
          </div>
          <div class="modal-body">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              File <strong>XLS</strong> (Excel 97-2003) yang diizinkan!!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <form action="" enctype="multipart/form-data" id="form">
              <input type="file" name="file" id="file" class="form-control pull-left">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-flat" id="btn-upload">Upload</button>
            <button type="button" class="btn btn-default btn-flat" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-form">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <img src="{{asset('/img/loading.gif')}}" alt="" id="loading-manual" style="height: 45px;">
          </div>
          <div class="modal-body">
            <div class="row">
              <form action="" id="form">
                <input type="hidden" id="data-id">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" autofocus>
                  </div>
                  <div class="form-group">
                    <label for="jns_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jns_kelamin" name="jns_kelamin">
                      <option value="">Pilih Salah Satu</option>
                      <option value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-flat" id="btn-simpan">Simpan</button>
            <button type="button" class="btn btn-primary btn-flat" id="btn-ubah">Ubah</button>
            <button type="button" class="btn btn-default btn-flat" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modal-hapus">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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