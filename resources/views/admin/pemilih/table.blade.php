@push('scripts')
<script>
  $(function() {
    $('#tabel').dataTable();
  });
</script>
@endpush

<table id="tabel" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Tanggal Lahir</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dataPemilih as $pemilih)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td style="text-transform: uppercase;">
        <?= $pemilih->name?>
      </td>
      <td style="text-transform: uppercase;">
        <?= $pemilih->username ?>
      </td>
      <td style="text-transform: uppercase;">
        <?= $pemilih->tanggal_lahir ?>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>