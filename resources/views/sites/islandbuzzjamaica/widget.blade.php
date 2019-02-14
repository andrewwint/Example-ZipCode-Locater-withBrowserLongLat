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
    <link rel='stylesheet' id='insite-grid-style-css'  href='https://insite.s3.amazonaws.com/io-editor/css/io-grid.css?ver=4.7.5' type='text/css' media='all' />
    <link rel='stylesheet' id='essential-grid-plugin-settings-css'  href='http://islandbuzzjamaica.com/wp-content/plugins/essential-grid/public/assets/css/settings.css?ver=2.0.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-open-sans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800&#038;ver=4.7.5' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-raleway-css'  href='http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&#038;ver=4.7.5' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-droid-serif-css'  href='http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700&#038;ver=4.7.5' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-lightbox-tosrus-css'  href='http://islandbuzzjamaica.com/wp-content/plugins/responsive-lightbox/assets/tosrus/css/jquery.tosrus.all.css?ver=1.6.10' type='text/css' media='all' />
    <link rel='stylesheet' id='dcwss-css'  href='http://islandbuzzjamaica.com/wp-content/plugins/wordpress-social-stream/css/dcwss.css?ver=4.7.5' type='text/css' media='all' />
    <link rel='stylesheet' id='foundation-css'  href='http://islandbuzzjamaica.com/wp-content/themes/goodlife-wp/assets/css/foundation.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='fa-css'  href='http://islandbuzzjamaica.com/wp-content/themes/goodlife-wp/assets/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='thb-app-css'  href='http://islandbuzzjamaica.com/wp-content/themes/goodlife-wp/assets/css/app.css' type='text/css' media='all' />
    <link rel='stylesheet' id='style-css'  href='http://islandbuzzjamaica.com/wp-content/themes/goodlife-wp-child/style.css' type='text/css' media='all' />

    <style media="screen">
    #agent-search{
      width: 50%;
      font-size: 1em;
      padding:9px 15px 9px 15px;
    }

    #zip{
      font-size: 1em;
      width:45%;
      padding:7px;
      background-color: #fff;
    }

    .fa-8x{
      font-size: 8.5em;
      color: #ddd;
      padding-top: .2em;
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
  <body>

    <div class="widget cf">
      <h4>Travel Agents Near you <br /><small>Enter your zip code to find a certified agent near you</small></h4>
      <form action="{{ route('ziplookup', ['site' => 'islandbuzzjamaica.index']) }}"  role="search" method="POST">
        {{ csrf_field() }}
        <div class="callout clearfix">
          <input type="text" class="float-left" id="zip" name="zip" placeholder="Search" value="{{ old('zip') }} {{$zip->zip or ''}}" />
          <button id="agent-search" type="submit" class="button float-right">Find Agent</button>

          @if ($errors->has('zip'))
            <span class="help-block">
              <strong>{{ $errors->first('zip') }}</strong>
            </span>
          @endif
        </div>
        <h7>Are you a travel agent?
          <br/>
          <small><a href="{{route('profile.request')}}" target="_blank"><u>Click here to request immediate access</u></a>, so you can update your profile, add a picture or a website link</small>
        </h7>
      </form>
    </div>

  </body>
</html>
