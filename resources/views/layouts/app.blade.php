<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
  ]) !!};
  </script>
  @yield('css-head')
  @yield('script-head')

</head>
<body onload="@yield('body-onload')">

  @yield('content')

  @isset($agents)
    <!-- Scripts -->
  <script type="text/javascript">
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    }
  }
  function showPosition(position) {
    window.location.href = '/home/'+position.coords.latitude+'/'+position.coords.longitude;
  }
  </script>
  @endisset

  @yield('scripts')
</body>
</html>
