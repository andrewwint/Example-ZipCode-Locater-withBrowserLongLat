<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <base href="#" target="_parent">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="http://www.visitjamaica.com/Themes/VisitJamaica/Styles/site.min.css" rel="stylesheet" type="text/css" />
    <link href="http://www.visitjamaica.com/Media/Default/_PiedoneModules/Combinator/Styles/-1046243587-2.css?timestamp=131097071510000000" rel="stylesheet" type="text/css" />
    <script src="http://www.visitjamaica.com/Media/Default/_PiedoneModules/Combinator/Scripts/193853294-1.js?timestamp=131097071520000000" type="text/javascript"></script>
    <link href="http://www.visitjamaica.com/Themes/VisitJamaica/content/favicon.ico" rel="shortcut icon" type="image/x-icon" />


    <style media="screen">
      body{
        background-color: #f7f7f7;
        padding-top: 0;
      }
    </style>

    <!-- Scripts -->
    <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
    </script>

    <title>Jamaica Travel Agent Look Up</title>
  </head>
  <body style="padding:15px">

        <h4>Travel Agents Near you <br /><small>Enter your zip code to find a certified agent near you</small></h4>
        <form action="{{ route('ziplookup', ['site' => 'visitjamaica.index']) }}"  role="search" method="POST">
          {{ csrf_field() }}
          <div class="callout">
            <input type="text" class="float-left" id="zip" name="zip" placeholder="Search" value="{{ old('zip') }} {{$zip->zip or ''}}" />
            <button id="agent-search" type="submit" class="button float-right">Find Agent</button>

            @if ($errors->has('zip'))
              <span class="help-block">
                <strong>{{ $errors->first('zip') }}</strong>
              </span>
            @endif
          </div>
          <br>

          <h7>Are you a travel agent?
            <br/>
            <small><a href="{{route('profile.request')}}" target="_blank"><u>Click here to request immediate access</u></a>, so you can update your profile, add a picture or a website link</small>
          </h7>
        </form>


  </body>
</html>
