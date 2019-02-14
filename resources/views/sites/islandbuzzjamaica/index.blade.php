@extends('sites.islandbuzzjamaica.layouts.app')

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
      window.location.href = '/islandbuzzjamaica/'+position.coords.latitude+'/'+position.coords.longitude;
    }
    </script>
  @endsection

  @section('body-onload', 'getLocation()')

@endempty

@section('content')

<div class="small-12 medium-12 columns">
    @empty($agents)
    <h5>
      Enter your zip code to find a certified agent near you
    </h5>


        <form action="{{ route('ziplookup', ['site' => 'islandbuzzjamaica.index']) }}" class="navbar-form navbar-left" role="search" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="text" class="form-control" id="zip-top" name="zip" placeholder="Search" value="{{ old('zip') }} " />
            <button type="submit" class="button" id="#agent-search-top">Find Agent</button>
            @if ($errors->has('zip'))
              <span class="help-block">
                <strong>{{ $errors->first('zip') }}</strong>
              </span>
            @endif
            <div class="bg-info" id="message"></div>
          </div>

        </form>
    @endempty

    @isset($agents)
      @foreach ($agents as $agent)
        <div class="small-12 medium-4 large-3 columns agent-block">
          <a href="{{ $agent['webpage'] or '#'}}" target="_blank">
            <div class="profile-pic-wrapper">
              @if (str_contains($agent['image_url'], 'http'))
                <div class="profile-pic">
                  <img src="{{$agent['image_url']}}" alt="{{ title_case($agent['first_name']) }} {{ title_case($agent['last_name']) }}">
                </div>
              @else
                <span class="fa fa-user fa-8x"></span>
              @endif
            </div>
            <h5>
              {{ strtoupper($agent['first_name']) }} {{ strtoupper($agent['last_name']) }}
            </h5>
          </a>
          @php
            $google_map_query_string = urlencode($agent['agency_name'] .', '. $agent['city'] .', '.  $agent['state_province'] .', '. $agent['postal_code']);
          @endphp

          <a href="http://maps.google.com/?q={{$google_map_query_string}}" target="_blank">
            <div class="agency-name">
              {{ $agent['agency_name'] }}
            </div>
            <div class="agency-address">
              {{ title_case($agent['city']) }} {{ strtoupper($agent['state_province']) }} {{$agent['postal_code']}}
            </div>
          </a>
          <div class="agency-phone-email">
            <div class="phone">
              <small><a href="tel:+{{ $agent['phone'] }}" target="_blank">{{ $agent['phone'] }}</a></small>
            </div>
            <div class="email">
              <small><a href="mailto:{{ $agent['email'] }}">{{ $agent['email'] }}</a></small>
            </div>
          </div>
          <div class="button-group">
            <a href="mailto:{{ $agent['email'] }}" target="_blank" class="button expanded">Email</a>
            <a href="tel:{{ $agent['phone'] }}" target="_blank" class="button expanded">Phone</a>
          </div>
        </div>
      @endforeach

    @endisset
  </div>
@endsection


@section('fixed-aside')
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
@endsection

@section('css-head')
<style type="text/css">
#agent-search, #agent-search-top{
  width:50%;
  padding:10px 20px 10px 20px;
}
#agent-search-top{

  padding:14px 20px 14px 20px;
}
#zip, #zip-top{
  font-size: 1em;
  width:45%;
  padding:7px 20px 7px 20px;
  background-color: #fff;
}
.agent-block {
  height: 25em;
}
.agent-block span{
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  justify-content: center;
}
.agent-block .profile-pic{
  position:absolute;
  clip:rect(0px,150px,150px,0px);
}
.profile-pic-wrapper{
  height: 10em;
}
.fa-8x{
  font-size: 8.5em;
  color: #ddd;
  padding-top: .2em;
}
.agent-block .expanded{
  width: 100%;
  margin-bottom: .5em;
}
.agent-block h5{
  height: 1.7em;
}
.agent-block .agency-name{
  font-size: .7em;
  height: 2.5em;
}
.agent-block .agency-address{
  font-size: 1.15em;
  font-weight:500;
  height: 2.2em;
}
.agent-block .agency-phone-email{
  height: 2.5em;
}
@media only screen and (max-width: 768px) {
  .profile-pic-wrapper{
    display: none;
  }
  .agent-block{
    height: 22em;
  }
  .agent-block h5{
    font-size: 1.7em;
    height: 1em;
    line-height: .9em;
    white-space: nowrap;
  }
  .agent-block .agency-phone-email{
    height: 2.3em;
    font-size: 1.9em;
  }

  .agent-block .agency-name {
    font-size: 1.4em;
    height: 3em;
    margin-top: .3em;

  }
  .button {
    font-size: 1.2em;
  }

}

</style>
@endsection
