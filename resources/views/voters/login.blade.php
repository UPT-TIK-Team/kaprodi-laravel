@push('customCSS')
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush

<x-body class="bg" :title="'Halaman Login'">
  <div class="container" style="margin-top: 5em;">
    <div class="card" style="color: #800000;">
      <div class="card-body">
        <div class="row">
          <div class="text-center">
            <h1 style="font-family: 'Raleway', sans-serif;"><b>Selamat Datang di Pemilihan Kaprodi</b></h1>
            <p style="font-family: 'Ubuntu', sans-serif;">Kita satukan tekad untuk Pemilu yang Luber dan Jurdil</p><br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 text-center position-relative">
            <img src="{{asset('/img/unsika-logo.png')}}" alt=""
              class=" img-responsive position-absolute top-50 start-50 translate-middle" style="width: 250px;">
          </div>
          <div class="col-sm-6">
            <div class="row">
              <form action="/login/authenticate" method="post">
                @csrf
                <h4 class="h4 mb-3 fw-normal">Login untuk mulai memilih</h4>

                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{session()->get('error')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                    name="username" id="username" autofocus>
                  @error('username')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="tanggal-lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control  @error('username') is-invalid @enderror" placeholder=" "
                    name="tanggal-lahir" id="tanggal-lahir">
                  @error('tanggal-lahir')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary" type="submit">Login</button>
                </div>
                <div class="mb-3">
                  <blockquote class="blockquote">
                    <p style="font-size: 12pt;"><b>Cara Memilih:</b><br>
                      Login dengan memasukan username ecampus dan tanggal lahir yang sudah terdata di ecampus untuk
                      melakukan pemilihan Ketua Program Studi. Pilih dengan cara mengklik tombol pilih.
                    </p>
                  </blockquote>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-body>