<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/skin-blue.min.css') }}">
  @stack('customCSS')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('/js/app.min.js') }}"></script>
  <script src="{{ asset('/js/highcharts.js') }}"></script>
  <script src="{{ asset('/js/jquery.easeScroll.js') }}"></script>
  <script src="{{ asset('/js/ajax.js') }}"></script>
  <script src="{{ asset('/js/script.js') }}"></script>
  <script>
    const baseURL="{{url('')}}"

    // Convet all table with "table" id to datatable
    $(function() {
      $('#tabel').dataTable();
    });

    // Ajax Setup
    $.ajaxSetup({
      headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
    });
  </script>
</head>

@yield('body')

@stack('scripts')

</html>