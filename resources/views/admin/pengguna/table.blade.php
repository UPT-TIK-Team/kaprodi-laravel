<table id="tabel" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dataPengguna as $pengguna)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$pengguna->name}}</td>
      <td>{{$pengguna->username}}</td>
      <td>{{$pengguna->email}}</td>
      @if ((int)$pengguna->role === 1)
      <td>admin</td>
      @else
      <td>panitia</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>