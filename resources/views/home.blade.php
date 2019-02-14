@extends('layouts.app')


@empty($agents)

  @section('script-head')
    <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      }
    }
    function showPosition(position) {
      var message = document.getElementById("message");
      message.innerHTML = '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 75%"><span class="sr-only">Search in progress 75% Complete</span></div></div>';
      window.location.href = '/home/'+position.coords.latitude+'/'+position.coords.longitude;
    }
    </script>
  @endsection

  @section('body-onload', 'getLocation()')

@endempty

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

      @empty($agents)

        <h1>Travel Agents Near you <br /><small>Enter your zip code to find a certified agent near you</small></h1>

        <div class="bg-info" id="message"></div>

        <form action="{{ route('ziplookup', ['site' => 'home.index']) }}" class="navbar-form navbar-left" role="search" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="text" class="form-control" name="zip" placeholder="Search" value="{{ old('zip') }} " />
            @if ($errors->has('zip'))
              <span class="help-block">
                <strong>{{ $errors->first('zip') }}</strong>
              </span>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Find Travel Agent</button>
        </form>
      </div><!-- End Search Block -->


    @endempty

    @isset($agents)
      <h1>Travel Agents Near You</h1>
      Top {{ count($agents) }} Travel Agents in your zip code {{$zip->zip}}.
      <div class="container-fluid">
        <div class="row">
          @foreach ($agents as $agent)
            <div class="col-md-3  col-sm-4 agent-block">
              <h4>{{ strtoupper($agent['first_name']) }} {{ strtoupper($agent['last_name']) }}
                <br/><small>{{ $agent['agency_name'] }}</small></h4>
                {{ $agent['city'] }} {{ $agent['state_province']}} {{$agent['postal_code']}}
                <br />
                <a href="tel:+{{ $agent['phone'] }}" target="_blank">{{ $agent['phone'] }}</a>
                <br />
                <small><a href="mailto:{{ $agent['email'] }}">{{ $agent['email'] }}</a></small><br/>

                <div class="container-fluid">
                  <div class="row">
                    <div>
                      <a href="mailto:{{ $agent['email'] }}" target="_blank" class="btn btn-primary btn-group-justified">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email
                      </a>
                      <br/>
                    </div>
                    <div>
                      <a href="mailto:{{ $agent['phone'] }}" target="_blank" class="btn btn-primary btn-group-justified">
                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Phone
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            @endforeach
          </div>

        </div>

        <div class="col-md-4">
          <h4>Travel Agents Near you <br /><small>Enter your zip code to find a certified agent near you</small></h4>
          <form action="{{ route('ziplookup', ['site' => 'home.index']) }}" class="navbar-form navbar-left" role="search" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" name="zip" placeholder="Search" value="{{ old('zip') }} {{$zip->zip }}" />

              @if ($errors->has('zip'))
                <span class="help-block">
                  <strong>{{ $errors->first('zip') }}</strong>
                </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Find Travel Agent</button>
          </form>
        </div><!-- End Search Block -->

      </div>
    @endisset
  </div>
</div>
</div>
@endsection
