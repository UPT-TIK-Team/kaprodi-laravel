@push('scripts')
<script>
  const namaProdi = '{{$coba}}'
</script>
<script src="{{ asset('/js/admin-data.js') }}"></script>
@endpush

<x-body :title="'Halaman Dashboard'">
  <section class="content-header">
    <h1 style="float: left;">
      Dashboard
    </h1>&nbsp;&nbsp;
    Real time
    <div class="btn-group" id="realtime" data-toggle="btn-toggle">
      <button type="button" class="btn btn-default btn-xs" data-toggle="on" onclick="start()">On</button>
      <button type="button" class="btn btn-default btn-xs active" data-toggle="off"
        onclick="clearInterval(realtime)">Off</button>
    </div>
    <div id="box"></div>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Dashboard</li>
    </ol>
  </section>

  <section class="content" id="view-dashboard">
  </section>
</x-body>